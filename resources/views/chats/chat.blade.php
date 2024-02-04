@extends('layouts.windmill')
@section('contenido')
<div>
    <div class="flex">
        <div class="chatbot chatnew">
            <header class="flex justify-between items-center p-4 bg-gray-800 text-white">
                <h1 class="">Chat</h1>
                <button id="leave-btn" class="btn bg-red-450 text-white px-4 py-2"><i class="fa fa-door-open"></i> Salir</button>
            </header>
            <ul class=" chat-messages">

                <!--  <li class="chat incoming">
                    <p>Hola <br>¿Cómo estás?</p>
                </li>

                <li class="chat outgoing">
                    <p>¿Te puedo hacer una pregunta?</p>
                </li> -->
            </ul>
            <form id="chat-form">
                <div class="chat-input">
                    <textarea id="msg" required placeholder="Escribe un mensaje" autocomplete="off"></textarea>
                    <button class="btn"><i class="fas fa-paper-plane"></i> Enviar</button>
                </div>
            </form>
        </div>
        
        <div class="users">
            <header>
                <h1 id="room-name">Chat Box</h1>
            </header>
            <ul id="users" class="list"></ul>

        </div>
    </div>

</div>
<script src="https://cdn.socket.io/4.7.4/socket.io.min.js" integrity="sha384-Gr6Lu2Ajx28mzwyVR8CFkULdCU7kMlZ9UthllibdOSo6qAiN+yXNHqtgdTvFXMT4" crossorigin="anonymous"></script>
<script src="{{asset('chatjs/js/main.js') }}"></script>


@endsection