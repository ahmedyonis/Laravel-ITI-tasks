<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>{{$title}}</title>
</head>
<body class="homepage">
    <header id="header">
        <h1>{{$title}}</h1>
    </header>

    {{$slot}}

    <footer id="footer">
        &copy; 2025 ITI Project
    </footer>

</body>
</html>