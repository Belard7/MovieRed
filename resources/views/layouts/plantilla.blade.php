<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('titulo', 'CineRed')</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('https://images.unsplash.com/photo-1598899134739-24c46f58d7b2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            color: white;
            text-align: center;
        }
        nav {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 10px;
            display: flex;
            justify-content: space-between;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }
        .contenido {
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <nav>
        <div><a href="/">CineRed</a></div>
        <div>
            <a href="/bienvenida">Inicio</a>
            <a href="#">Películas</a>
            <a href="#">Mi Perfil</a>
        </div>
    </nav>

    <div class="contenido">
        @yield('contenido')
    </div>
</body>
</html>
