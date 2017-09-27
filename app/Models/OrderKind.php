<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderKind extends Model
{
    protected $table = 'order_kinds';
    protected $primaryKey = 'id';
    public $timestamps = false;
}