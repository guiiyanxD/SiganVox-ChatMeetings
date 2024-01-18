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

                <header class="px-8 py-6 text-gray-50 border-b border-gray-200">
                    <h1 class="text-gray-700 text-lg font-semibold">
                        {{ __('Cree una nueva sala de chat') }}
                    </h1>
                </header>

                <div class="px-8 py-6">
                    <ul class="divide-y divide-gray-200">
                    </ul>
                    <form action="">
                        {{-- Primera hilera: Nombre y descripcion--}}
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="meet_name">
                                    Nombre
                                </label>
                                <input id="meet_name" class="appearance-none block w-full bg-gray-50 text-gray-700 border border-purple-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="text" placeholder="Nombre de la sala">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="meet_description">
                                    Descripcion
                                </label>
                                <input id="meet_description" class="appearance-none block w-full bg-gray-50 text-gray-700 border border-purple-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Descripcion de la sala">
                            </div>
                        </div>

                        {{-- Segunda hilera: Fecha de expiracion del codigo y fecha de expiracion --}}
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="meet_expiration">
                                    Fecha de expiracion del codigo
                                </label>
                                <input id="meet_expiration" class="appearance-none block w-full bg-gray-50 text-gray-700 border border-purple-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="date" placeholder="Fecha de expiracion">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="meet_qty">
                                    Cantidad
                                </label>
                                <input id="meet_qty" class="appearance-none block w-full bg-gray-50 text-gray-700 border border-purple-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="number" min="0" max="99" placeholder="Cantidad de invitados">
                            </div>

                        </div>
                    </form>

                </div>

                <footer class="px-8 py-3  border-t border-gray-200">
                    <div class="flex justify-end">
                        <x-button id="new-meet-button" >
                            Crear sala
                        </x-button>
                    </div>

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
                    <form action="">

                        {{-- Primera hilera: Nombre y descripcion--}}
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/1 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="join_meet">
                                    Codigo de invitación
                                </label>
                                <input id="join_meet" class="appearance-none block w-full bg-gray-50 text-gray-700 border border-purple-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"  type="text" placeholder="Ingresa el codigo de invitación de la sala">
                            </div>
                        </div>
                    </form>

                </div>

                <footer  class="px-8 py-3  border-t border-gray-200">
                    <div class="flex justify-end">
                        <x-button id="join-meet-button" >
                            ¡Unete!
                        </x-button>
                    </div>

                </footer>

            </section>
        </div>

        <div class=" w-2/5 h-12 px-1">
            <section class="bg-white p-4 rounded-md shadow-md">

                <header class="px-8 py-6 text-gray-50 border-b border-gray-200">
                    <h1 class="text-gray-700 text-lg font-semibold">
                        {{ __('Historial de salas') }}
                    </h1>
                </header>
            </section>
        </div>
    </div>





@endsection
