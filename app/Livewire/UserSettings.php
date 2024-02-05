<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class UserSettings extends Component
{
    public String $message = "Necesito mensajes personalizados";
    public bool $is_mute = false;

    public function isMute(){
        $user = User::findOrFail(Auth::id());
        $this->is_mute = !$this->is_mute;
        $user->is_mute = $this->is_mute;
        $user->save();
        return $this->is_mute;
    }


    public function render()
    {
        return view('livewire.user-settings');
    }
}
