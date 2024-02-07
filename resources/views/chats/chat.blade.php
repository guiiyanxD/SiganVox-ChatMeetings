@extends('layouts.chat-layout')
@section('contenido')
<div>

    <div class="flex ">
        <div class="w-3/5 h-full px-1">
            <div class="chatbot chatnew">
                <header class="flex justify-between items-center p-4 bg-gray-800 text-white">
                    <h1 class="mx-6">Chat</h1>
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
        </div>

        <div class="w-2/5 px-1">
            <div class="h-2/5">
                <section class="p-4 users">
                    <header>
                        <h1 id="room-name">Chat Box</h1>
                    </header>
                    <ul id="users" class="list"></ul>
                </section>
            </div>

            <div class="h-3/5">
                <section class=" w-full p-4">

                    <video class="" id="video"  muted autoplay width="640" height="480"></video>
                    <button id="start_btn" >Play</button>
                    <button id="stop_btn" >Stop</button>

                </section>
            </div>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs/dist/tf.min.js"></script>

<script>
    window.onload = async function (){
        const parts = [];
        let mediaRecorder;
        // let refModel = require('./')
        // const model = await tf.loadGraphModel(  );


        navigator.mediaDevices.getUserMedia( {audio: false, video: true} )
            .then( stream => {
                mediaRecorder = stream;
                document.getElementById("video").srcObject = stream;
                document.getElementById("start_btn").onclick = function (){
                    mediaRecorder = new MediaRecorder(stream)
                    mediaRecorder.start(1000);
                    mediaRecorder.ondataavailable = function (e) {
                        parts.push(e.data);
                    }
                }
            })
            .catch(error => {
                console.error('Error al obtener acceso a la cámara web: ', error);
            });

        document.getElementById("stop_btn").onclick = function (){
            if(mediaRecorder && mediaRecorder.state !== 'inactive'){
                mediaRecorder.stop();
                mediaRecorder.onstop = async function(){
                    const blob = new Blob(parts, {
                        type:"video/webm"
                    });
                    const url = URL.createObjectURL(blob);
                    const video = document.createElement('video');
                    video.src = url;
                    /*video.onloadeddata = async function() {
                        const predictions = await model.detect(video)
                        console.log('Predictions: ', predictions);
                    }*/

                }
            }
        }
    }
</script>
<script src="https://cdn.socket.io/4.7.4/socket.io.min.js" integrity="sha384-Gr6Lu2Ajx28mzwyVR8CFkULdCU7kMlZ9UthllibdOSo6qAiN+yXNHqtgdTvFXMT4" crossorigin="anonymous"></script>
<script src="{{asset('chatjs/js/main.js') }}"></script>


@endsection
