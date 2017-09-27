<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItemLog extends Model
{
    protected $table = 'order_item_logs';
    protected $primaryKey = 'id';
    public $timestamps = false;
}