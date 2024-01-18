<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipationType extends Model
{
    use HasFactory;

    protected $table = 'participation_types';

    protected  $fillable =['name', 'description'];

    public function UserMeet(){
        return $this->hasMany(UserMeet::class,'participation_type_id');
    }
}
