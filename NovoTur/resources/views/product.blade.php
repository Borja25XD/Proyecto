@extends(".layouts/base")

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
    <link rel="stylesheet" href={{ asset('/css/product.css?v=') . time() }}>
    {{-- Aqui puedes poner otro css específico para cada producto --}}
@endsection

@section('content')
    <div class="card text-center">
        <div class="card-header">
            {{ __($product->category) }}
        </div>
        <div class="card-body">
            <img src={{ url('/images/' . $product->url . '.jpg') }} class="card-img-center" alt="{{ $product->url }}">
            <h5 class="card-title">{{ __($product->name) }}</h5>
            <p class="card-text">{{ __($product->description) }}</p>
            <a href="#" class="btn btn-primary">Añadir al carrito</a>
        </div>
        <div class="card-footer text-muted">
            <a href="../tienda">Volver a la tienda</a>
        </div>
    </div>
@endsection
