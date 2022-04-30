@extends(".layouts/base")

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
    <link rel="stylesheet" href={{ asset('/css/shop.css?v=') . time() }}>
    {{-- Aqui puedes poner otro css específico para la tienda como hice en booking --}}
@endsection

@section('content')
    <div class="container">
        <h1>Página de la tienda</h1>
        <div class="row">
            @foreach ($products as $product)
            <div class="col-3">
                <div class="card text-center" style="width: 18rem;">
                    <img src={{  url("/images/" .$product->url. ".jpg")  }} class="card-img-center" alt="{{ $product->url }}">
                    <div class="card-body">
                    <h5 class="card-title">{{ __($product->name) }}</h5>
                    <p class="card-text">{{ __($product->category) }}</p>
                    <p class="card-brand">{{ __($product->brand) }}</p>
                    <a href="#" class="btn btn-primary">{{ __('Show more') }}</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection
