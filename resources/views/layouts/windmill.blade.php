<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" />
    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}
    <script src="{{ asset('js/init-alpine.js') }}"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        /* Agrega estilos CSS aquí */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            color: white;
        }


        .chatbot {
            position: static;
            /* Cambiado a fixed para que se mantenga en su posición incluso al hacer scroll */
            top: 0;
            left: 0;
            width: 65%;
            height: 80%;
            overflow: hidden;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
                0 32px 64px -48px rgba(0, 0, 0, 0.5);
        }

        .users {
            position: static;
            /* Cambiado a fixed para que se mantenga en su posición incluso al hacer scroll */
            top: 0;
            left: 0;
            width: 25%;
            height: 550px;
            overflow: hidden;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
                0 32px 64px -48px rgba(0, 0, 0, 0.5);
        }

        .chatbot header {
            background: purple;
            padding: 16px 0;
            text-align: center;
        }

        .users header {
            background: darkslategray;
            padding: 16px 0;
            text-align: center;
        }

        .users .list li{
            /*background-color: #f4f4f4;*/
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 10px;
            background-color: darkslategray;
        }

        .chatbot header h2 {
            color: #fff;
            font-size: 1.4rem;
        }

        .chatbot .chatbox {
            height: 400px;
            overflow-y: auto;
            padding: 15px 20px 70px;
            color: black;
        }

        .chatbox .chat {
            display: flex;
        }

        .chatbox .incoming span {
            height: 32px;
            width: 32px;
            color: black;
            background: purple;
        }

        .chatbox .outgoing {
            margin: 20px 0;
            justify-content: flex-end;
        }

        .chatbox .chat p {
            color: #fff;
            max-width: 75%;
            font-size: 0.95rem;
            padding: 12px 16px;
            border-radius: 10px 10px 0 10px;
            background: purple;
        }

        .chatbox .incoming p {
            color: black;
            background: burlywood;
            border-radius: 10px 20px 0 10px;
            /*align-self: "/";*/
        }

        .chatbot .chat-input {
            /*  position: absolute; */
            bottom: 0;
            /* width: 64%; */
            display: flex;
            gap: 5px;
            background: #fff;
            padding: 5px 20px;
            border-radius: 7px;
            border-top: 1px solid #ccc;
        }

        .chatbot .chat-input textarea {
            height: 55px;
            width: calc(100% - 80px);
            /* Ajuste del ancho del textarea para dejar espacio para el botón */
            border: none;
            outline: none;
            font-size: 0.95rem;
            resize: none;
            padding: 16px 15px 16px 0;

        }

        .chat-input textarea {
            height: 55px;
            width: 100%;
            border: none;
            outline: none;
            font-size: 0.95rem;
            resize: none;
            padding: 16px 15px 16px 0;
            color: black;
        }

        .chatbot .chat-input button {
            height: 55px;
            width: 80px;
            /* Ancho del botón */
            background: #28a745;
            /* Color de fondo del botón */
            color: #fff;
            /* Color del texto del botón */
            border: none;
            border-radius: 7px;
            cursor: pointer;
            font-size: 0.95rem;
        }

        .chatbot .chat-input input {
            color: black;
            /* Cambia el color del texto dentro del input */
            caret-color: black;
            /* Cambia el color del cursor */
        }


        /* Estilos generales para el chat */
        .chatnew {

            margin: 20px auto;
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
        }

        .chatnew .chat {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .chatnew .message {
            background-color: #f4f4f4;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .chatnew .incoming {
            align-self: flex-start;
        }

        /* Estilos para la información del mensaje */
        .chatnew .meta {
            color: #555;
            font-size: 12px;
            margin-bottom: 5px;
        }

        /* Estilos para el nombre de usuario */
        .chatnew .username {
            padding-left: 10px;
            font-weight: bold;
            color: #333;
        }

        /* Estilos para el texto del mensaje */
        .chatnew .text {
            color: #333;
        }

        .chatnew .span {
            padding-left: 10px;
        }

        /* Estilos para el área de mensajes */
        .chatnew .chat-messages {
            padding: 10px;
            /*  max-height: 300px; */
            overflow-y: auto;
            height: 58vh;
        }
    </style>
    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/d68e27db16.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    @livewireScripts

    {{-- SweetAlert2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('css')
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
            @include('layouts.navegacion')
        </aside>
        <!-- Mobile sidebar -->
        <!-- Backdrop -->
        <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
        <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">

            @include('layouts.navegacion')

        </aside>
        <div class="flex flex-col flex-1">
            <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
                <div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
                    <!-- Mobile hamburger -->
                    <button class="p-1 -ml-1 mr-5 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" @click="toggleSideMenu" aria-label="Menu">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <!-- Search input -->
                    @include('layouts.search')

                    <ul class="flex items-center flex-shrink-0 space-x-6">

                        @include('layouts.traducirpython')

                        @include('layouts.tema')

                        @include('layouts.notificaciones')

                        @include('layouts.menu-usuario')
                    </ul>
                </div>
            </header>
            <main class="h-full pb-16 overflow-y-auto">
                <!-- Remove everything INSIDE this div to a really blank page -->
                <div class="container px-6 mx-auto grid">
                    @yield('contenido')
                </div>
            </main>
        </div>
    </div>
    @stack('modals')


    @stack('js')

</body>

</html>
