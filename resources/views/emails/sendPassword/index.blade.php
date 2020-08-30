<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emails</title>
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>
    <div class="jumbotron container bg-transparent">
        <h1 class="display-4 ">Bienvenido a {{ config('app.name', 'SGA') }}</h1>
        <p>{{ $title }}</p>
        <p class="lead">{{ $content }}</p>
        <hr class="my-4">
        <a class="btn btn-primary btn-lg" href="http://127.0.0.1:8000/login" role="button">Login</a>
    </div>
</body>
</html>