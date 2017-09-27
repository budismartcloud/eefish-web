<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourierAssignment extends Model
{
    protected $table = 'courier_assignments';
    protected $primaryKey = 'id';
    public $timestamps = false;
}