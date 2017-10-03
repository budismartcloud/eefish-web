<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FishCategory extends Model
{
    protected $table = 'fish_categories';
    protected $primaryKey = 'id';
    public $timestamps = false;
}