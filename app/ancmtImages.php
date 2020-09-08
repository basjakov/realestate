<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ancmtImages extends Model
{
    protected $fillable = ['ancmt_id', 'filename'];

    public function announcement()
    {
        return $this->belongsTo('App\announcement');
    }
}
