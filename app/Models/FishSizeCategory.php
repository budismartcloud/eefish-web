<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FishSizeCategory extends Model
{
    protected $table = 'fish_size_categories';
    protected $primaryKey = 'id';
    public $timestamps = false;
}