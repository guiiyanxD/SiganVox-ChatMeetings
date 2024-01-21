@extends('layouts.windmill')
@section('contenido')
    <div class="bg-white rounded p-4 mb-6 mt-2 ">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-200">
            Salas de chats
        </h2>
    </div>
    <div class="flex mb-4">
        <div class="w-3/5 h-12 px-1">
            <section class="bg-white p-4 rounded-md shadow-md">
                @if(session('error_message'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Hey!</strong>
                        <span class="block sm:inline">{{session('error_message')}}</span>

                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                    </div>

                @endif
                <header class="px-8 py-6 text-gray-50 border-b border-gray-200">
                    <h1 class="text-gray-700 text-lg font-semibold">
                        {{ __('Cree una nueva sala de chat') }}
                    </h1>
                </header>

                <div class="px-8 py-6">
                    <ul class="divide-y divide-gray-200">
                    </ul>
                    <form action="{{route('salasChats.storeAsHost')}}" method="POST">
                        @csrf
                        {{-- Primera hilera: Nombre y descripcion--}}
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="meet_name">
                                    Nombre
                                </label>
                                <input id="meet_name" name="meet_name" class="appearance-none block w-full bg-gray-50 text-gray-700 border border-purple-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="text" placeholder="Nombre de la sala">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="meet_description">
                                    Descripcion
                                </label>
                                <input id="meet_description" name="meet_description" class="appearance-none block w-full bg-gray-50 text-gray-700 border border-purple-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Descripcion de la sala">
                            </div>
                        </div>

                        {{-- Segunda hilera: Fecha de expiracion del codigo y fecha de expiracion --}}
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="meet_expiration">
                                    Fecha de expiracion del codigo
                                </label>
                                <input id="meet_expiration" name="meet_expiration" class="appearance-none block w-full bg-gray-50 text-gray-700 border border-purple-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="date" placeholder="Fecha de expiracion">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="meet_qty">
                                    Cantidad
                                </label>
                                <input id="meet_qty" name="meet_qty" class="appearance-none block w-full bg-gray-50 text-gray-700 border border-purple-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="number" min="0" max="99" placeholder="Cantidad de invitados">
                            </div>

                        </div>
                        <div class="flex justify-end">
                            <x-button id="new-meet-button" >
                                Crear sala
                            </x-button>
                        </div>
                    </form>

                </div>
                <footer class="px-8 py-1  border-t border-gray-200">
                </footer>


            </section>

            <section class="bg-white p-4 my-6 rounded-md shadow-md">
                <header class="px-8 py-6 text-gray-50 border-b border-gray-200">
                    <h1 class="text-gray-700 text-lg font-semibold">
                        {{ __('Unete a una sala de chat que ya existe') }}
                    </h1>
                </header>

                <div class="px-8 py-6">
                    <ul class="divide-y divide-gray-200">
                    </ul>
                    <form action="{{route('salasChats.storeAsGuest')}}" method="POST">
                        @csrf
                        {{-- Primera hilera: Nombre y descripcion--}}
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/1 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="join_meet">
                                    Codigo de invitación
                                </label>
                                <input id="join_meet" name="meet_code" class="appearance-none block w-full bg-gray-50 text-gray-700 border border-purple-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="text" placeholder="Ingresa el codigo de invitación de la sala">
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <x-button id="join-meet-button" >
                                ¡Unete!
                            </x-button>
                        </div>
                    </form>

                </div>

                <footer  class="px-8 py-1  border-t border-gray-200"></footer>

            </section>
        </div>

        <div class=" w-2/5 px-1 h-4/5 " >
            <section class="bg-white p-4 rounded-md shadow-md">

                <header class="px-8 py-6 text-gray-50 border-b border-gray-200">
                    <h1 class="text-gray-700 text-lg font-semibold">
                        {{ __('Historial de salas') }}
                    </h1>
                </header>
                <section class=" h-96 overflow-auto">
                    @foreach($meets as $meet)
                        <div class="max-w-sm w-full rounded overflow-hidden shadow-lg lg:max-w-full lg:flex">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{$meet->meets->name}}</div>
                                <p class="text-gray-700 text-base">
                                    {{$meet->meets->description}}
                                </p>
                            </div>
                            <div class="px-6 pt-4 pb-2">
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$meet->meets->invite->code}}</span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                            </div>
                            <div class="flex justify-end">
                                <x-button id="resume-meet-button">
                                    Unirse
                                </x-button>
                            </div>
                        </div>
                        <br>
                    @endforeach

                    {{--<div class="max-w-sm w-full rounded overflow-hidden shadow-lg lg:max-w-full lg:flex">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
                            <p class="text-gray-700 text-base">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                            </p>
                        </div>
                        <div class="px-6 pt-4 pb-2">
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                        </div>
                    </div>
                    <br>
                    <div class="max-w-sm w-full rounded overflow-hidden shadow-lg lg:max-w-full lg:flex">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
                            <p class="text-gray-700 text-base">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                            </p>
                        </div>
                        <div class="px-6 pt-4 pb-2">
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                        </div>
                    </div>
                    <br>--}}

                </section>

            </section>
        </div>
    </div>





@endsection
