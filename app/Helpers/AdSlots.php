<?php
namespace App\Helpers;

use Carbon\Carbon;

use App\Content;
use App\Campaign;
use App\CampaignSlot;

class AdSlots
{

    public static function getAvailableSlots()
    {
        $slots = [];
        $contents = Content::dynamicAds()->get();

        foreach ($contents as $content) {
            $fields = json_decode($content->fields);
            if(isset($fields->list)) {
                if (count($fields->list) > 0) { // tiene slots
                    foreach ($fields->list as $slot_data) {
                        $slot = new \stdClass;
                        $slot->name = $slot_data->fields->name;
                        $slot->name_analytics = $slot_data->fields->name_analytics;
                        $slot->uuid = $slot_data->fields->uuid;
                        $slot->folder = $content->folder;

                        $slots[] = $slot;
                    }
                }
            }
            
        }

        return $slots;

    }

    /*
    Esta funcion estandariza la estructura del slot
    y permite obtenerlo medienta el uui
    */

    public static function getSlot($slot_uuid)
    {
        $content = Content::DynamicAds()->where('fields', 'like', "%{$slot_uuid}%")->first();
        
        if ($content === null) {
            return false;
        }

        $fields = json_decode($content->fields);
        foreach ($fields->list as $slot_data) {
            if ($slot_data->fields->uuid === $slot_uuid) {
                $slot = new \stdClass;
                $slot->name = $slot_data->fields->name;
                $slot->name_analytics = $slot_data->fields->name_analytics;
                $slot->uuid = $slot_data->fields->uuid;
                $slot->folder = $content->folder;

                return $slot;
            }
        }

        return false;
        
    }

    public static function getDisplayData($slot_uuid)
    {
        /*
        Obtiene el listado de campañas activas que sean permanentes
        o cuya fecha de inicio sea menor o igual a hoy y su fecha de fin
        se mayor o igual a hoy, ordenadas por prioridad ascendente
        */
        
        $active_campaigns = Campaign::whereIsActive(1)->where(function ($query) {
            $query->whereIsPermanent(1)
                ->orWhere(function ($query) {
                    $query->where('start_datetime', '<=', Carbon::now());
                    $query->where('end_datetime', '>=', Carbon::now());
                });
        })->orderBy('priority')->get();


        foreach($active_campaigns as $campaign) {
            $display_data = CampaignSlot::whereCampaignId($campaign->id)->whereSlotUuid($slot_uuid)->first();

            if ($display_data !== null) {
                $slot = self::getSlot($slot_uuid);
                
                $result = new \stdClass;
                
                $result->campaign_analytics = $campaign->name_analytics;
                $result->slot_analytics = $slot->name_analytics;
                $result->desktop_image = $display_data->desktop_image;
                $result->mobile_image = $display_data->mobile_image;
                $result->target = boolval($display_data->blank) ? "_blank" : "_self";
                $result->url = $display_data->url;
                
                return $result;

            }
        }

        return false;

    }

}
