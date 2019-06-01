<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignSlot extends Model{

    protected $table = 'campaign_slots';

    protected $fillable = [
        'campaign_id',
        'slot_uuid'
    ];

    protected $casts = [
        'new_window' => 'boolean',
    ];

    public $timestamps = false;

    public function scopeForCampaign($query, $campaign_id)
    {
        return $query->whereCampaignId($campaign_id);
    }

    public function getUrlAttribute() {
        if (isset($this->link) && $this->link !== null && $this->link != '') {
            if (is_numeric($this->link)) {
                if ($i = Folder::find($this->link)) {
                    return $i->getLink()['href']; /// TODO podria querer meter logica de target _blank para paginas linkeadas que vayan para afuera
                } else {
                    return $this->link;
                }
            } else {
                $scheme = parse_url($this->link, PHP_URL_SCHEME);
                if (empty($scheme)) {
                    $link = 'http://' . ltrim($this->link, '/');
                } else {
                    $link = $this->link;
                }
                return $link;
            }
        } else {
            return '#';
        }
    }

}
