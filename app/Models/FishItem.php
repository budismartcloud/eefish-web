<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FishItem extends Model
{
    protected $table = 'fish_items';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function getFish()
    {
        return $this->hasOne('App\Models\Fish', 'id', 'fish_item_fishes_id');
    }

    public function getSize()
    {
        return $this->hasOne('App\Models\FishSizeCategory', 'id', 'fish_item_fish_size_categories_id');
    }
}