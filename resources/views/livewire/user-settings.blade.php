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
            <x-label for="accesibilidad" value="{{__('Soy el label del boton accesibilidad')}}"/>
            <x-checkbox name="accesibilidad"/>
        </div>
    </x-slot>

</x-action-section>
