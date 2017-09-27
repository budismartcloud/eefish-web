<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FishItem extends Model
{
    protected $table = 'fish_items';
    protected $primaryKey = 'id';
    public $timestamps = false;
}