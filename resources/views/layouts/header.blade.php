<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar Tres</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css')}}">
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="img/Pikachu.png" alt="Logo de la marca">
        </div>
        <nav>
           <ul class="nav-links">
                <li><a href="{{route('pokemons.index')}}">Pokemones</a></li>
                <li><a href="{{route('favoritos.index')}}">Mis favoritos</a></li>
           </ul>            
        </nav>
    </header>
</body>
</html>