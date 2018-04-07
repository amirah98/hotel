<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $table = 'room_types';

    protected $fillable = ['name', 'cost_per_day', 'size', 'max_adult', 'max_child', 'description', 'room_service', 'status'];

    public function images()
    {
        return $this->hasMany('App\Model\Image');
    }

    public function rooms()
    {
        return $this->hasMany('App\Model\Room');
    }

    public function facilities()
    {
        return $this->belongsToMany('App\Model\Facility', 'facility_room_type')->withTimestamps();
    }
}
