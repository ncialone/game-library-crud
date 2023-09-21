<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Formulario de creación de videojuegos</h1>
    <p><a href="{{ route('games') }}"> Lista de Videojuegos</a></p>
    <h2>sirve para prueba</h2>
    <form action="{{ route('createVideogame') }}" method="POST">

        @csrf

        <input type="text" placeholder="Nombre del videojuego" name="name">
        {{-- Si falla envía el msj de error, siendo este que el campo no puede estar vacío --}}
        @error('name')
            {{ $message }}
        @enderror
        <select name="category_id" id="">
            @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>