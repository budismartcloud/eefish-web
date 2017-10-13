<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
    protected $table = 'fishes';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function getCategory()
    {
        return $this->hasOne('App\Models\FishCategory', 'id', 'fish_fish_categories_id');
    }

    public function getItem()
    {
        return $this->hasMany('App\Models\FishItem', 'fish_item_fishes_id', 'id');
    }

}