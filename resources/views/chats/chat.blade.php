@extends('layouts.windmill')
@section('contenido')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .chat-container {
            width: 100%;
            /* Cambiado a 100% para ocupar todo el ancho */
            margin: 100px auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
            position: relative;
            /* Añadida propiedad position */
        }

        .chat-header {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            text-align: center;
            font-size: 18px;
            margin-bottom: 0;
            /* Ajustado a 0 para reducir el espacio hacia abajo */
        }


        .chat-messages {
            padding: 10px;
            max-height: 300px;
            overflow-y: auto;
        }

        .message {
            margin-bottom: 10px;
        }

        .message.sender {
            text-align: right;
        }

        .message.receiver {
            text-align: left;
        }

        .message p {
            background-color: #fff;
            padding: 8px;
            border-radius: 5px;
            margin: 0;
            display: inline-block;
        }

        .input-container {
            position: fixed;
            /* Añadida propiedad position */
            bottom: 0;
            /* Añadida propiedad bottom */
            width: 80%;
            /* Cambiado a 100% para ocupar todo el ancho */
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #f9f9f9;
            border: 2px solid #ccc;
            border-radius: 5px;
        }

        .input-container input {
            flex-grow: 1;
            padding: 8px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .input-container button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 8px 15px;
            cursor: pointer;
            border-radius: 3px;
        }
    </style>


    <title>Vista de Chat</title>
</head>

<body>

    <div class="chat-container">
        <div class="chat-header">Chat en Vivo</div>
        <div class="chat-messages">
            <div class="message receiver">
                <p>Hola, ¿cómo estás?</p>
            </div>
            <div class="message sender">
                <p¡Hola! Estoy bien, gracias.>
                    </p>
            </div>
            <!-- Agregar más mensajes según sea necesario -->
        </div>
        <div class="input-container">
            <input type="text" placeholder="Escribe tu mensaje...">
            <button onclick="sendMessage()">Enviar</button>
        </div>
    </div>

    <script>
        function sendMessage() {
            var inputElement = document.querySelector('input');
            var messageText = inputElement.value;

            if (messageText.trim() !== '') {
                var chatMessages = document.querySelector('.chat-messages');
                var messageContainer = document.createElement('div');
                messageContainer.classList.add('message', 'sender');
                messageContainer.innerHTML = '<p>' + messageText + '</p>';
                chatMessages.appendChild(messageContainer);

                // Limpiar el input después de enviar el mensaje
                inputElement.value = '';

                // Puedes implementar la lógica adicional para el manejo del mensaje aquí
            }
        }
    </script>

</body>

</html>
@endsection