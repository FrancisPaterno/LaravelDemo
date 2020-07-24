<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rooms extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['room', 'description', 'room_type_id', 'room_status_id', 'user_id'];

    public function roomType(){
        return $this->belongsTo(Room_Type::class);
    }

    public function roomStatus(){
        return $this->belongsTo(RoomStatus::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
