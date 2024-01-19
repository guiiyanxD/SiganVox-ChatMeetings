<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    use HasFactory;

    protected $table = 'invites';

    protected $fillable = ['code','uses', 'max_usages', 'expires_at', 'to'];


    public function Meet(){
        return $this->hasOne(Meet::class,'invite_id');

    }
}
