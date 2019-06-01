<?php

namespace App\Http\Controllers\Admin;

use App\Campaign;
use App\CalendarEvent;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Helpers\AdSlots;
use App\CampaignSlot;

class CampaignController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $campaigns = Campaign::orderBy('priority')->orderBy('start_datetime')->paginate(50)->appends($request->input());
        return view('admin.campaigns', [
            'campaigns' => $campaigns
        ]);
    }

    public function add(Request $request) {

        $campaign = new \stdClass;
        $campaign->id = '';
        $campaign->name = '';
        $campaign->name_analytics = '';
        $campaign->priority = '';
        $campaign->start_datetime = '';
        $campaign->end_datetime = '';

        return view('admin.campaigns_edit', [
            'action' => 'add',
            'campaign' => $campaign
        ]);
    }

    public function edit(Request $request, $id) {
        $campaign = Campaign::where('id', $id)->first();
        
        // obtengo los slots usados en la camapaña
        $campaign_slots = CampaignSlot::forCampaign($campaign->id)->get();
        
        // obtengo todos los slots disponibles del sitio
        $available_slots = AdSlots::getAvailableSlots();

        // filtro los slots usados de los disponibles para listar los no usados
        $unused_slots = collect(array_filter($available_slots, function($slot) use($campaign) {
            return CampaignSlot::whereSlotUuid($slot->uuid)->whereCampaignId($campaign->id)->first() === null;
        }));

        $used_slots = $campaign_slots->map(function($slot) {
            return AdSlots::getSlot($slot->slot_uuid);
        });

        return view('admin.campaigns_edit', [
            'action' => 'edit',
            'campaign' => $campaign,
            'used_slots' => $used_slots,
            'unused_slots' => $unused_slots
        ]);
    }

    public function slotEdit($campaign_id, $slot_uuid)
    {
        $cs = CampaignSlot::whereCampaignId($campaign_id)->whereSlotUuid($slot_uuid)->first();
        $action = 'edit';

        if(!$cs) {
            $cs = new \stdClass;
            $cs->campaign_id = $campaign_id;
            $cs->slot_uuid = $slot_uuid;
            $cs->blank = false;
            $cs->is_active = true;
            $action = 'add';
        }

        return view('admin.campaigns_slot', ['cs' => $cs, 'action' => $action]);
    }

    public function post(Request $request) {

        $validatedData = $request->validate([
            'name' => 'required',
            'name_analytics' => 'required',
        ]);


        $campaign = new Campaign();

        $this->saveRequestToCampaign($request, $campaign);

        $keep_editing = boolval($request->input('keep_editing', false));

        if ($keep_editing) {
            return redirect()->route('admin.campanias.edit', ['id' => $campaign->id]);
        } else {
            return redirect()->route('admin.campanias.index');
        }

    }

    public function put(Request $request, $id) {
        $campaign = Campaign::where('id', $id)->firstOrFail();

        $this->saveRequestToCampaign($request, $campaign);

        $keep_editing = boolval($request->input('keep_editing', false));

        if ($keep_editing) {
            return redirect()->route('admin.campanias.edit', ['id' => $campaign->id]);
        } else {
            return redirect()->route('admin.campanias.index');
        }
    }

    public function slotDelete($campaign_id, $slot_uuid)
    {
        $slot = CampaignSlot::whereCampaignId($campaign_id)->whereSlotUuid($slot_uuid)->firstOrFail();

        $slot->delete();

        return 'ok';
    }

    public function slotSave(Request $request, $campaign_id, $slot_uuid)
    {
        $slot = CampaignSlot::firstOrCreate([
            'campaign_id' => $campaign_id,
            'slot_uuid' => $slot_uuid
        ]);
        
        $slot->link = $request->input('link', null);
        $slot->desktop_image = $request->input('desktop_image', null);
        $slot->mobile_image = $request->input('mobile_image', null);
        $slot->blank = $request->input('blank', false);

        $slot->save();

        return redirect()->route('admin.campanias.edit', ['id' => $campaign_id]);
        
    }

    private function saveRequestToCampaign($request, &$campaign) {
        $name = $request->input('name');
        $name_analytics = $request->input('name_analytics');
        $priority = $request->input('priority');
        $is_permanent = boolval($request->input('is_permanent', false));
        $is_active = boolval($request->input('is_active', false));

        if (!$is_permanent) {
            $start_date = \Carbon\Carbon::createFromFormat('d/m/Y', $request->input('start_date'));
            $start_time = "{$request->input('start_hour')}:{$request->input('start_minute')}";
            $campaign->start_datetime = $start_date->format('Y-m-d') . " {$start_time}:00";

            $end_date = \Carbon\Carbon::createFromFormat('d/m/Y', $request->input('end_date'));
            $end_time = "{$request->input('end_hour')}:{$request->input('end_minute')}";
            $campaign->end_datetime = $end_date->format('Y-m-d') . " {$end_time}:00";
        } else {
            $campaign->start_datetime = null;
            $campaign->end_datetime = null;
        }
        

        $campaign->name = $name;
        $campaign->name_analytics = $name_analytics;
        $campaign->priority = $priority;
        $campaign->is_permanent = $is_permanent;
        $campaign->is_active = $is_active;

        $campaign->save();
    }

    public function delete(Request $request, $id) {
        $campaign = Campaign::where('id', $id)->firstOrFail();
        $campaign->delete();
        return redirect()->route('admin.campanias.index');
    }



}
