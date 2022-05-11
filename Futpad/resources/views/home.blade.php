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
            <img class="d-block w-100" src="{{ url('/images/pitch2.jpg') }}" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
              <h3 style="color:red">¡<a href="{{route('booking')}}" style="color:red">RESERVA</a> YA TU PISTA DE PÁDEL!</h3>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ url('/images/shop/camiseta-artengo-nino.jpg') }}" alt="Second slide" style="height:730px; width:700px">
            <div class="carousel-caption d-none d-md-block">
              <h5 style="color:white">Camiseta Artengo</h5>
              <p>Ideal para estás épocas de frío, manteniendo la comodidad</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ url('/images/shop/paletero-bullpadel.jpg') }}" alt="Third slide" style="height:730px; width:700px">
            <div class="carousel-caption d-none d-md-block">
              <h5><a href="{{route('product', 26)}}">{{__('Padle bat bag')}} 11€</a></h5>
              <p>{{__('Buy now the best products at the best price')}}</p>
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
