<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomStatus extends Model
{
    //
    use SoftDeletes;
    protected $table = 'room_status';
    protected $dates = ['deleted_at'];
    protected $fillable = ['status'];
}
