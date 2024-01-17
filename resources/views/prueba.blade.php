<!-- resources/views/tensorflow.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detección de Objetos</title>
</head>

<body>
    <video id="webcam" width="640" height="480" autoplay></video>
    <canvas id="canvas" width="640" height="480"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
    <script src="https://cdn.jsdelivr.net/npm/react-webcam"></script>

    <script>
        const labelMap = {
            1: {
                name: 'ayer',
                color: 'red'
            },
            2: {
                name: 'bienvenido',
                color: 'yellow'
            },
            3: {
                name: 'buenasTardes',
                color: 'lime'
            },
            4: {
                name: 'chau',
                color: 'blue'
            },
            5: {
                name: 'dormir',
                color: 'purple'
            },
            6: {
                name: 'gracias',
                color: 'purple'
            },
            7: {
                name: 'hermano',
                color: 'purple'
            },
            8: {
                name: 'hola',
                color: 'purple'
            },
            9: {
                name: 'hoy',
                color: 'purple'
            },
            10: {
                name: 'lunes',
                color: 'purple'
            },
            11: {
                name: 'madre',
                color: 'purple'
            },
            12: {
                name: 'mañana',
                color: 'purple'
            },
            13: {
                name: 'miercoles',
                color: 'purple'
            },
            14: {
                name: 'padre',
                color: 'purple'
            },
            15: {
                name: 'porfavor',
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


                    console.log(labelMap[text]['name'], scores[i]);

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

            //const net = await tf.loadGraphModel('{{ asset('model.json') }}');
            const modelPath = '{{ asset('model.json') }}';

            // Cargar el modelo utilizando tf.loadLayersModel
            const net = await tf.loadLayersModel(`${modelPath}`);
            console.log(net);

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
                const obj =  net.execute(expanded);

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
</body>

</html>
