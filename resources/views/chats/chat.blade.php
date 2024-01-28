@extends('layouts.windmill')
@section('contenido')
<!DOCTYPE html>
<html lang="es" dir=ltr>

<head>
    <meta charset="utf-8">
    <title>Chat Box</title>
    <link rel=stylesheet href=style.css>
    <meta name=viewport content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
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
            width: 81%;
            height: 600px;
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

        .chatbox .incoming span{
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
            align-self: "flex-end";
        }

        .chatbot .chat-input {
            position: absolute;
            bottom: 0;
            width: 64%;
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
            color:black;
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
            color: black; /* Cambia el color del texto dentro del input */
            caret-color: black; /* Cambia el color del cursor */
        }
    </style>
</head>

<body>
    <div class=chatbot>
        <header>
            <h1>Chat Box</h1>
        </header>
        <ul class="chatbox">
            <li class="chat incoming">
                <p>Hola <br>¿Cómo estás?</p>
            </li>
            <li class="chat outgoing">
                <p>¿Te puedo hacer una pregunta?</p>
            </li>
        </ul>
        <div class="chat-input">
            <textarea placeholder="Escribe un mensaje"></textarea>
            <button type="button" class="btn btn-success">Enviar</button>

        </div>
    </div>
</body>

</html>
@endsection