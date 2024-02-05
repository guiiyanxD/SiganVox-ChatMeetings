@extends('layouts.windmill')
@section('contenido')
    <div class="bg-white rounded p-4 mb-6 mt-2 text-center">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-200">
            Inicio
        </h2>
    </div>

    <div class="bg-white p-4 rounded-md shadow-md">
        <p class="text-lg text-black font-semibold">Has iniciado Sesión correctamente</p>
        <p class="text-lg text-black font-semibold">{{\Illuminate\Support\Facades\Auth::user()->is_mute}}</p>
    </div>
@endsection
