<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organic</title>
</head>
<body>
    <h1>Hola Mundo {{ $nombre }} {{ $apellido }}</h1>

    <ul>
    @foreach ($post as $item)
    <li>The current value is {{ $item }} {{$loop->iteration}}</li>
    @endforeach
    </ul>


</body>
</html>