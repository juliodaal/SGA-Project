@extends('landing.landing')

@section('title', 'Landing Page')

@section('content')
<header class="bg-light header">
    <div class="jumbotron container bg-transparent">
        <h1 class="display-4 ">Bienvenido a {{ config('app.name', 'SGA') }}</h1>
        <p class="lead">Este es un proyecto que ayuda a administrar la asistencia de los estudiantes en una Universidad o Escuela.</p>
        <hr class="my-4">
        <p>Presiona en <strong>Login</strong> para iniciar sesión en tu cuenta.</p>
        <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
    </div>
</header>
<section>
<div class="card-columns container">
    <div class="card shadow ">
        <img src="{{ asset( 'image/1.PNG') }}" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">Disciplinas</h5>
        <p class="card-text">Puedes inscribirte y ver todas las disciplinas en las cuales te encuentras asociado, como profesor o estudiante, en tu Universidad o Escuela.</p>
        </div>
    </div>
    <div class="card p-3 shadow ">
        <blockquote class="blockquote mb-0 card-body">
        <p>Conoce tu programa, fechas y horas en las cuales tienes que ver o dar clases.</p>
        </blockquote>
    </div>
    <div class="card shadow ">
        <img src="{{ asset( 'image/2.PNG') }}" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">Grupo de Estudiantes</h5>
        <p class="card-text">Como Profesor encuentra todos los Estudiantes registrados o en una Disciplina especifica.</p>
        </div>
    </div>
    <div class="card bg-primary text-white text-center p-3 shadow ">
        <blockquote class="blockquote mb-0">
        <p>La lógica puede llevarte de un punto A a un punto B. La imaginación puede llevarte a cualquier lugar.</p> 
        <!-- It does not matter how slowly you go as long as you do not stop -->
        <footer class="blockquote-footer text-white">
            <small>
            By <cite title="Source Title">Albert Einstein</cite>
            </small>
        </footer>
        </blockquote>
    </div>
    <div class="card shadow ">
        <img src="{{ asset( 'image/3.PNG') }}" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">Estudiantes</h5>
        <p class="card-text">Saber donde has estado, en todo lugar y en todo momento.</p>
        </div>
    </div>
    <div class="card shadow ">
        <div class="card-body">
        <p class="card-text">Observa tus entradas y salidas, en Aulas.</p>
        </div>
    </div>
    </div>
</section>
<section class=" d-flex justify-content-center align-items-center bg-light">
    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel" style="height: 500px; width: 1000px">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="{{ asset( 'image/3.PNG') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="{{ asset( 'image/2.PNG') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="{{ asset( 'image/1.PNG') }}" class="d-block w-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
</section>
<section>
<div class="jumbotron jumbotron-fluid m-0">
  <div class="container">
    <h1 class="display-4">Documentación</h1>
    <p class="lead">Puedes ver toda la documentación de este proyecto abajo.</p>
  </div>
</div>
</section>
<section class="container">
    <div class="row">
        <div class="row no-gutters bg-light position-relative">
        <div class="col-md-6 mb-md-0 p-md-4">
            <img src="{{ asset( 'image/GitHub.png') }}" class="w-100" alt="...">
        </div>
        <div class="col-md-6 position-static p-4 pl-md-0 d-flex flex-column justify-content-center">
            <h5 class="mt-0">Sigue el proyecto en GitHub.</h5>
            <p>Si lo deseas, puedes ver todo el proyecto en mi GitHub. Puedes descargarlo, y usarlo para tus estudios, hobbies o simplemente para mirarlo. Espero que lo disfrutes.</p>
            <a href="https://github.com/juliodaal/SGA-Project---Version-2-" class="stretched-link" target="_blank">Ir a GitHub</a>
        </div>
        </div>
    </div>
</section>
<footer class="text-center">
    @JD - Project Laravel WebSite
</footer>
@endsection