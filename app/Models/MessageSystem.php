<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageSystem extends Model
{
    protected $table = 'message_systems';
    protected $primaryKey = 'id';
    public $timestamps = false;
}