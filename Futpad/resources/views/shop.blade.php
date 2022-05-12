@extends(".layouts/base")

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
    <link rel="stylesheet" href={{ asset('/css/shop.css?v=') . time() }}>
    {{-- Aqui puedes poner otro css específico para la tienda como hice en booking --}}
@endsection

@section('content')
    <div class="container">
        <h1 class="shop">{{__('Futpad Online Shop')}}</h1>
        <div class="row">
            <div class="col-3">
                <div class="products-nav">
                    <ul>
                        <li class="products-nav-item"><a class="nav-item-p" href="">{{ __('All') }}</a></li>
                        <li class="products-nav-item"><a class="nav-item-p" href="">{{ __('Accesories') }}</a></li>
                        <li class="products-nav-item"><a class="nav-item-p" href="">{{ __('Balls') }}</a></li>
                        <li class="products-nav-item"><a class="nav-item-p" href="">{{ __('Clothes') }}</a></li>
                        <li class="products-nav-item"><a class="nav-item-p" href="">{{ __('Padelbat') }}</a></li>
                        <li class="products-nav-item"><a class="nav-item-p" href="">{{ __('Padelbatbag') }}</a></li>
                        <li class="products-nav-item"><a class="nav-item-p" href="">{{ __('Sportshoes') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-9">
                <div class="row">
                @foreach ($products as $item)
                    <div class="col-4">
                        <div class="card text-center" style="width: 18rem;">
                            <img src={{ url('/images/shop/' . $item->url . '.jpg') }} class="card-img-center"
                                alt="{{ $item->url }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ __($item->name) }}</h5>
                                <p class="card-text">{{ __($item->category) }}</p>
                                <p class="card-brand">{{ __($item->brand) }}</p>
                                <a href="{{ route('product', $item->id) }}" class="btn btn-primary">{{ __('Show more') }}</a>
                                <form action="{{route('cart.add')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$item->id}}">
                                    <input type="submit" name="btn"  class="btn btn-primary shop-cart" value="{{__('Add to cart')}}">
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">{!! $products->links() !!}</div>
        </div>
    </div>
    
@endsection
