{{--
<div>
     <h1>
         {{$message}}
     </h1>
</div>
--}}

<x-action-section>
    <x-slot name="title">
        {{__('Accesibilidad')}}
    </x-slot>

    <x-slot name="description">
        {{__('Selecciona la configuracion de accesibilidad')}}
    </x-slot>

    <x-slot name="content">
        <div class="mt-4">
            <x-label for="accesibilidad" value="{{__('Selecciona si necesitas ayuda con los mensajes dentro de las salas de chat')}}"/>

            <label class="relative inline-flex items-center cursor-pointer">
                <input wire:click="isMute" type="checkbox" @if( \Illuminate\Support\Facades\Auth::user()->$is_mute == 1 ) checked @endif value="" class="sr-only peer">
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300
                dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700
                rtl:peer-checked:after:-translate-x-full  after:content-['']
                after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300
                after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600
                peer-checked:bg-blue-600 peer-checked:after:translate-x-full peer-checked:after:border-white">
                </div>
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">@if( !$is_mute ) No @endif {{$message}}</span>
            </label>

           {{-- <h5>{{ $count }}</h5>
            <x-button wire:click="increment">Increment</x-button>
            <x-button wire:click="decrement">Decrement</x-button>--}}
        </div>
    </x-slot>

</x-action-section>
