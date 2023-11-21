<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>localhost/retickets/{{ $ticket->id }}</title>
</head>

<body>
    <p>{{ $ticket->seat_number }}</p>
    <p>{{ $ticket->name }}</p>
    <p>{{ $ticket->tent }}</p>
</body>
</html>
