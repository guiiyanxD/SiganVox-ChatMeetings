<?php

namespace App\Livewire;

use Livewire\Component;

class UserSettings extends Component
{
    public $message = "This is a public message";

    public function render()
    {
        return view('livewire.user-settings');
//            ->layout('layouts.windmill')
            /*->slot('contenido')*/;
    }
}
