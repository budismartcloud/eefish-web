<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    protected $table = 'couriers';
    protected $primaryKey = 'id';
    public $timestamps = false;
}