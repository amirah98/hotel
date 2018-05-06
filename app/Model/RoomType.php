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

    public function getDiscountedPriceAttribute()
    {
        return $this->cost_per_day - (($this->cost_per_day/100) * $this->discount_percentage);
    }

    public function getFinalPriceAttribute()
    {
        $after_service_charge = $this->discountedPrice + (($this->discountedPrice/100) * config('app.service_charge_percentage'));
        $after_vat = $after_service_charge + (($after_service_charge/100) * config('app.vat_percentage'));
        return $after_vat;
    }


    public function getRatingsCount(){
        $rating_count = 0;
        foreach($this->rooms as $room){
            foreach($room->reviews as $review){
                if($review->approval_status == 'approved'){
                    if($review->rating != 0) {
                        $rating_count++;
                    }
                }
            }
        }
        return $rating_count;
    }

    public function getAggregatedRating(){
        $total_rating = 0;
        $rating_count = 0;
        foreach($this->rooms as $room){
            foreach($room->reviews as $review){
                if($review->approval_status == 'approved'){
                    if($review->rating != 0) {
                        $total_rating = $total_rating + $review->rating;
                        $rating_count++;
                    }
                }
            }
        }

        if($total_rating > 0 && $rating_count > 0){
            return $total_rating/$rating_count;
        } else{
            return 0;
        }
    }

}
