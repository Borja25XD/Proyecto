@extends('.layouts/base')

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
    <link rel="stylesheet" href={{ asset('/css/home.css?v=') . time() }}>
@endsection

@section('content')
<div class="container p-0">
    <h1>Página de inicio de Futpad</h1>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
        <div id="carouselBox" class="carousel-inner rounded">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{ url('/images/camiseta-artengo-nino.jpg') }}" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>Sudadera Artengo, 9'99€</h5>
              <p>Aquí se puede poner enlace a la tienda</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ url('/images/gorra-adidas.jpg') }}" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>Imagen de prueba pero se puede poner algo sobre las pistas</h5>
              <p>Aquí se puede poner enlace a reservas</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ url('/images/paletero-bullpadel.jpg') }}" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>Paletero 11€</h5>
              <p>No dejes escapar la promocion</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
</div>
@endsection
