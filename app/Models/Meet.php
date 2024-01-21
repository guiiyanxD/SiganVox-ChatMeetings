<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meet extends Model
{
    use HasFactory;

    protected $table ='meets';

    protected $fillable = [
        'invite_id','name','description',
    ];

    public function UserMeet(){
        return $this->hasMany(UserMeet::class, 'meet_id' );
    }

    public function Invite(){
        return $this->belongsTo(Invite::class, 'invite_id');
    }
}
