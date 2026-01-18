<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Series</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
</body>
    <h3>Séries</h3>
    <ul>
        @foreach($series as $serie)
            <li>{{ $serie }}</li>
        @endforeach
    </ul>
</html>
