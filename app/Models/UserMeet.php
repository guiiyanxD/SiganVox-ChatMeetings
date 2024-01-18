<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMeet extends Model
{
    use HasFactory;

    protected $table ='users_meets';

    protected $fillable = ['user_id', 'meet_id', 'participation_type_id', 'entries_qty'];

    public function Meets(){
        return $this->belongsTo(Meet::class, 'meet_id');
    }

    public function Users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ParticipationTypes(){
        return $this->belongsTo(ParticipationType::class, 'participation_type_id');
    }
}
