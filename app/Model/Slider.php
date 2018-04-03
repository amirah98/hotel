<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'slider';

    protected $fillable = ['name', 'small_title', 'big_title', 'description', 'link', 'link_test', 'status'];

}
