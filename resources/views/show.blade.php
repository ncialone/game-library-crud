<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @if ($categoryGame)
        <h1>El nombre de juego es: {{ $nameVideogame }} y la categoría es: {{ $categoryGame }}</h1>
    @else
        <h1>El nombre de juego es: {{ $nameVideogame }}
    @endif


    <h3>{{ $fecha }}</h3>
</body>
</html>