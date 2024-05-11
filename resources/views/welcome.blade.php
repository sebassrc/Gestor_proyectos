<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Universidad Icesi</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Icono icesi  -->
    <link rel="icon" href="https://tse4.mm.bing.net/th?id=OIP.OCpxlK3ahohii0BuZvlMLgAAAA&pid=Api&P=0&h=180" type="image/png">

    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .texto-blanco {
            background-color: white;
            /* Color blanco con opacidad */
            padding: 30px;
            /* Aumenta el espaciado interno */
            border-radius: 40px;
            /* Bordes redondeados */
            display: inline-block;
            /* Elemento en línea */
            text-align: center;
            /* Centra el contenido del div */
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
            /* Agrega sombra */
        }

        .texto-blanco img {
            width: 350px;
            /* Ajusta el ancho de la imagen */
            height: 100px;
            /* Ajusta la altura de la imagen */
            margin-top: 60px 60px 60px 60px;
            /* Espacio entre el icono y el texto */
        }

        /* Estilos para los botones  */
        .login-btn,
        .register-btn {
            width: 500px; /* Ancho de los botones */
            margin: 10px auto; /* Margen para centrar horizontalmente */
            padding: 15px 0; /* Espaciado interno */
            border-radius: 19px; /* Bordes redondeados */
            text-decoration: none; /* Sin subrayado */
            display: block; /* Para que ocupen todo el ancho */
            text-align: center; /* Centra el texto horizontalmente */
            color: white; /* Color de texto */
        }

        .login-btn {
            background-color: #007bff; /* Color de fondo azul */
        }

        .register-btn {
            background-color: #28a745; /* Color de fondo verde */
        }
    </style>

</head>

<body class="antialiased">
    <header>
        <div class="container">
            <div class="texto-blanco"> <!-- Envuelve el contenido de texto en un cuadro blanco -->
                <img src="https://tse3.mm.bing.net/th?id=OIP.urjoQIepLX8u3_AGGiMEjQHaCU&pid=Api&P=0&h=180" alt="cecep.icon" clase="texto-blanco img">
                <br><br><br>
                <div> <!-- Envuelve los botones en un div para ajustar el margen -->
                    <a href="{{ route('register') }}" class="register-btn">Register</a>
                    <a href="{{ route('login') }}" class="login-btn">Login</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @include('footer')
</body>

</html>
