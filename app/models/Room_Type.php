<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room_Type extends Model
{
    //
    use SoftDeletes;
    protected $table = 'room_types';
    protected $dates = ['deleted_at'];
    protected $fillable = ['type', 'description', 'rate', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
