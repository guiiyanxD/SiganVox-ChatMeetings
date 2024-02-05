@extends('layouts.windmill')
@section('contenido')
<div class="bg-white rounded p-4 mb-6 mt-2 text-center relative">
    <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-200">
        Traducir
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="relative">
            <video id="webcam" width="640" height="480" autoplay style="position: absolute; top: 0; left: 0;"></video>
            <canvas id="canvas" width="640" height="480" style="position: absolute; top: 0; left: 0;"></canvas>
        </div>

        <div>
            <label for="mensaje" class="block text-sm font-medium text-gray-700 mb-2">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" rows="15" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500"></textarea>
        </div>
    </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
    <script src="https://cdn.jsdelivr.net/npm/react-webcam"></script>

    <script>
         var textarea = document.getElementById('mensaje');
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
        // public/js/tensorflow-script.js
        document.addEventListener('DOMContentLoaded', async function() {
            const webcam = document.getElementById('webcam');
            const canvas = document.getElementById('canvas');
            const ctx = canvas.getContext('2d');

            const net = await tf.loadGraphModel('http://127.0.0.1:8000/model.json');

            const runCoco = async () => {
                const stream = await navigator.mediaDevices.getUserMedia({
                    'video': true
                });
                webcam.srcObject = stream;

                setInterval(() => {
                    detect(net);
                }, 16.7);
            };

            const detect = async (net) => {
                const video = webcam;
                const videoWidth = video.videoWidth;
                const videoHeight = video.videoHeight;

                video.width = videoWidth;
                video.height = videoHeight;
                canvas.width = videoWidth;
                canvas.height = videoHeight;

                const img = tf.browser.fromPixels(video);
                const resized = tf.image.resizeBilinear(img, [640, 480]);
                const casted = resized.cast('int32');
                const expanded = casted.expandDims(0);
                const obj = await net.executeAsync(expanded);

                const boxes = await obj[1].array();
                const classes = await obj[2].array();
                const scores = await obj[4].array();

                drawRect(boxes[0], classes[0], scores[0], 0.7, videoWidth, videoHeight, ctx);

                tf.dispose(img);
                tf.dispose(resized);
                tf.dispose(casted);
                tf.dispose(expanded);
                tf.dispose(obj);
            };

            runCoco();
        });
    </script>
@endsection
