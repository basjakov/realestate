<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class announcement extends Model
{
    protected $fillable = [
        'estate_desc',
        'estate_type',
        'location',
        'address',
        'building',
        'apt',
        'cascade_code',
        'cascade_code2',
        'price',
        'currency',
        'floor',
        'storey',
        'square_meter',
        'land_area',
        'position',
        'Significance',
        'rooms',
        'toilets',
        'typeofbld',
        'celling_height',
        'condition',
        'comunal',
        'additional',
        'videourl',
        'desc_arm',
        'desc_eng',
        'desc_rus',
        'other',
        'published',
        'ready_prt'
    ];
    public  function setComunal($value){
        $this->attributes['comunal'] = json_encode($value);
    }
    public function getComunal($value){
        return $this->attributes['comunal'] = json_decode($value);
    }
    public function setAdditional($value)
    {

        $this->attributes['additional'] = json_encode($value);
    }

    public function getAdditional($value)
    {

        return $this->attributes['additional'] = json_decode($value);
    }
}
