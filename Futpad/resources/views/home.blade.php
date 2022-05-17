@extends('.layouts/base')

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
    <link rel="stylesheet" href={{ asset('/css/home.css?v=') . time() }}>
@endsection

@section('content')
<div class="container p-0 bg-light rounded my-4 p-3">
    <h1 class="home-title">{{__('Welcome to FutPad!')}}</h1>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      </div>
        <div id="carouselBox" class="carousel-inner rounded">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{ url('/images/pitch2.jpg') }}" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
              <form action="{{route('booking')}}">
                <button class="pitch-link"><a href="{{route('booking')}}">{{__('Book your paddle court now!')}}</a></button>
              </form>
            </div>
          </div>
          <div class="carousel-item second-slide">
            <img class="d-block w-100" src="{{ url('/images/pitch3.jpg') }}" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
              <h3>{{__('Buy now the best products at the best price')}}</h3>
              <form action="{{route('shop')}}">
                <button class="shop-link"><a href="{{route('shop')}}">{{__('Go to the shop')}}</a></button>
              </form>
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
      <p class="home-description"></p>
</div>
@endsection
