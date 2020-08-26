@extends('layouts.landing')

@section('title', 'Landing Page')

@section('content')
<header class="bg-light header">
    <div class="jumbotron container bg-transparent">
        <h1 class="display-4 ">Welcome to {{ config('app.name', 'SGA') }}</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
    </div>
</header>
<section>
<div class="card-columns container">
    <div class="card shadow ">
        <img src="{{ asset( 'image/1.PNG') }}" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">Card title that wraps to a new line</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
    </div>
    <div class="card p-3 shadow ">
        <blockquote class="blockquote mb-0 card-body">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        <footer class="blockquote-footer">
            <small class="text-muted">
            Someone famous in <cite title="Source Title">Source Title</cite>
            </small>
        </footer>
        </blockquote>
    </div>
    <div class="card shadow ">
        <img src="{{ asset( 'image/2.PNG') }}" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div>
    <div class="card bg-primary text-white text-center p-3 shadow ">
        <blockquote class="blockquote mb-0">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
        <footer class="blockquote-footer text-white">
            <small>
            Someone famous in <cite title="Source Title">Source Title</cite>
            </small>
        </footer>
        </blockquote>
    </div>
    <div class="card text-center shadow ">
        <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This card has a regular title and short paragraphy of text below it.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div>
    <div class="card shadow ">
        <img src="{{ asset( 'image/3.PNG') }}" class="card-img-top" alt="...">
    </div>
    <div class="card p-3 text-right shadow ">
        <blockquote class="blockquote mb-0">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
        <footer class="blockquote-footer">
            <small class="text-muted">
            Someone famous in <cite title="Source Title">Source Title</cite>
            </small>
        </footer>
        </blockquote>
    </div>
    <div class="card shadow ">
        <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is another card with title and supporting text below. This card has some additional content to make it slightly taller overall.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
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
    <h1 class="display-4">Fluid jumbotron</h1>
    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
  </div>
</div>
</section>
<section class="container">
    <div class="row">
        <div class="row no-gutters bg-light position-relative">
        <div class="col-md-6 mb-md-0 p-md-4">
            <img src="{{ asset( 'image/GitHub.png') }}" class="w-100" alt="...">
        </div>
        <div class="col-md-6 position-static p-4 pl-md-0">
            <h5 class="mt-0">Columns with stretched link</h5>
            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
            <a href="#" class="stretched-link">Go somewhere</a>
        </div>
        </div>
    </div>
</section>
<section class="container my-5">
<div class="row d-flex shadow-lg">
<nav id="navbar-example3" class="col-sm-3 navbar navbar-light bg-light d-flex flex-column justify-content-start">
  <a class="navbar-brand" href="#">Navbar</a>
  <nav class="nav nav-pills flex-column">
    <a class="nav-link" href="#item-1">Item 1</a>
    <nav class="nav nav-pills flex-column">
      <a class="nav-link ml-3 my-1" href="#item-1-1">Item 1-1</a>
      <a class="nav-link ml-3 my-1" href="#item-1-2">Item 1-2</a>
    </nav>
    <a class="nav-link" href="#item-2">Item 2</a>
    <a class="nav-link" href="#item-3">Item 3</a>
    <nav class="nav nav-pills flex-column">
      <a class="nav-link ml-3 my-1" href="#item-3-1">Item 3-1</a>
      <a class="nav-link ml-3 my-1" href="#item-3-2">Item 3-2</a>
    </nav>
  </nav>
</nav>
<div class="col-sm-9 p-4 overflow-auto" data-spy="scroll" data-target="#navbar-example3" data-offset="0" style="height: 80vh;">
  <h4 id="item-1">Item 1</h4>
  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum aliquam aperiam nesciunt natus incidunt quidem odit itaque. Excepturi hic voluptates assumenda fugiat recusandae tempore nobis, sunt porro, voluptate numquam dicta!</p>
  <h5 id="item-1-1">Item 1-1</h5>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum enim cum et praesentium mollitia beatae provident, inventore tenetur maiores ipsa laudantium iusto ex quos dolor veritatis, dolorum aperiam. Aliquid, enim.</p>
  <h5 id="item-1-2">Item 1-2</h5>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum dignissimos dolor totam dicta maxime, reiciendis exercitationem et laboriosam praesentium illum voluptatem vel doloremque alias, non omnis deserunt eveniet minus culpa.</p>
  <h4 id="item-2">Item 2</h4>
  <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit nemo temporibus dolore voluptatibus debitis accusamus maxime! Reprehenderit, labore quos. Sunt quidem quas deserunt nesciunt est possimus praesentium corrupti ducimus rem!</p>
  <h4 id="item-3">Item 3</h4>
  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. A fuga nobis, consectetur culpa omnis corporis perferendis optio officia similique, autem reiciendis quas nulla cupiditate nihil error harum fugit maiores aut!</p>
  <h5 id="item-3-1">Item 3-1</h5>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa fugiat optio numquam placeat rem officiis ex, necessitatibus esse non reprehenderit eos enim, maiores architecto facilis ea dignissimos qui cumque praesentium.</p>
  <h5 id="item-3-2">Item 3-2</h5>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus libero pariatur blanditiis dolor rem eum praesentium cumque cupiditate, qui fugiat quisquam quasi commodi atque similique repudiandae odio assumenda in obcaecati!</p>
</div>
</div>
</section>
<footer class="text-center">
    @JD - Project Laravel WebSite
</footer>
@endsection