@extends(".layouts/base")

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
    <link rel="stylesheet" href={{ asset('/css/product.css?v=') . time() }}>
    {{-- Aqui puedes poner otro css específico para cada producto --}}
@endsection

@section('content')
    <div class="card text-center">
        <div class="card-header">
            {{ __($item->category) }}
        </div>
        <div class="card-body">
            <img src={{ url('/images/shop/' . $item->url . '.jpg') }} class="card-img-center" alt="{{ $item->url }}">
            <h5 class="card-title">{{ __($item->name) }} ( <b>{{__($item->price)}} € </b>)</h5>
            <p class="card-text">{{ __($item->description) }}</p>
            <form action="{{route('cart.add')}}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{$item->id}}">
                <input type="submit" name="btn"  class="btn btn-primary" value="{{__('Add to cart')}}">
            </form>
        </div>
        <div class="card-footer text-muted">
            <a href="../tienda">{{__('Back to shop')}}</a>
        </div>
    </div>
@endsection
