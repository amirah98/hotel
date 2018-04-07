<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $table = 'facilities';

    protected $fillable = ['name', 'icon', 'description', 'status'];

    public function room_types()
    {
        return $this->belongsToMany('App\Model\RoomType', 'facility_room_type')->withTimestamps();
    }

}
