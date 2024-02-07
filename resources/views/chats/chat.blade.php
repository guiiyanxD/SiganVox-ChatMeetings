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
                <div id="liveview" class=" w-full p-4">
                    <button id="start_btn" class="bg-blue-500" >Play</button>
                    <button id="stop_btn"  class="bg-cyan-700">Stop</button>
                    <video class="" id="video"  muted autoplay width="640" height="480"></video>
                    <canvas class="" id="canvas" width="640" height="480"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs/dist/tf.min.js" type="text/javascript"></script>
<script>
    var textarea = document.getElementById('msg');
    const labelMap = {
        1: {
            name: 'Hola',
            color: 'red'
        },
        2: {
            name: 'Gracias',
            color: 'yellow'
        },
        3: {
            name: 'Te Amo',
            color: 'lime'
        },
        4: {
            name: 'Si',
            color: 'blue'
        },
        5: {
            name: 'No',
            color: 'purple'
        },
    }

    // Define a drawing function
    const drawRect = (boxes, classes, scores, threshold, imgWidth, imgHeight, ctx) => {
        for (let i = 0; i <= boxes.length; i++) {
            if (boxes[i] && classes[i] && scores[i] > threshold) {
                // Extract variables
                const [y, x, height, width] = boxes[i]
                const text = classes[i]

                // Set styling
                ctx.strokeStyle = labelMap[text]['color']
                ctx.lineWidth = 10
                ctx.fillStyle = 'white'
                ctx.font = '30px Arial'


                console.log(labelMap[text]['name'] , scores[i]);
                textarea.value += ' ' + labelMap[text]['name'];

                // DRAW!!co
                ctx.beginPath()
                ctx.fillText(labelMap[text]['name'] + ' - ' + Math.round(scores[i] * 100) / 100, x * imgWidth, y *
                    imgHeight - 10)
                ctx.rect(x * imgWidth, y * imgHeight, width * imgWidth / 2, height * imgHeight / 1.5);
                ctx.stroke()
            }
        }
    }
</script>
<script>
    window.onload = async function (){
        const parts = [];
        let mediaRecorder;
        let webcam;
        // let refModel = require('./')
        const model = await tf.loadLayersModel('model.json');
        const canvas = document.getElementById("canvas");
        const ctx = canvas.getContext('2d');



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
        // console.log(parts);

        document.getElementById("stop_btn").onclick = async function (){
            let blob;
            if(mediaRecorder && mediaRecorder.state !== 'inactive'){
                mediaRecorder.stop();
                mediaRecorder.onstop = async function(){
                    blob = new Blob(parts, {
                        type:"video/mp4"
                    });
                    const url = URL.createObjectURL(blob);
                    const video = document.createElement('video');
                    const duration = video.duration;
                    video.src = url;
                    video.onloadeddata = async function() {
                        const videoWidth = video.videoWidth;
                        const videoHeight = video.videoHeight;

                        video.width = videoWidth;
                        video.height = videoHeight;


                        const img = tf.browser.fromPixels(video);
                        // const gray = tf.image.rgb_to_grayscale(img)
                        const resized = tf.image.resizeBilinear(img,[30, 1662]);
                        const casted = resized.cast('float32');
                        const expanded = casted.expandDims(0);
                        // const obj = await model.executeAsync(expanded);

                        const predictions = await model.predict(resized)
                        console.log('Predictions: ', predictions);
                        tf.dispose(img);
                        tf.dispose(resized);
                        tf.dispose(casted);
                        tf.dispose(expanded);
                        tf.dispose(obj);

                    }

                }
            }
        }
    }
</script>


<script src="https://cdn.socket.io/4.7.4/socket.io.min.js" integrity="sha384-Gr6Lu2Ajx28mzwyVR8CFkULdCU7kMlZ9UthllibdOSo6qAiN+yXNHqtgdTvFXMT4" crossorigin="anonymous"></script>
<script src="{{asset('chatjs/js/main.js') }}"></script>


@endsection
