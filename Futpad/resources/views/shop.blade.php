@extends('.layouts/base')

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
    <link rel="stylesheet" href={{ asset('/css/shop.css?v=') . time() }}>
    {{-- Aqui puedes poner otro css específico para la tienda como hice en booking --}}
@endsection

@section('content')
    <div class="container bg-light rounded my-4  p-3">
        <h1 class="shop-title">{{ __('Futpad Online Shop') }}</h1>
        <div class="row">
            <div class="col-3">
                <div class="products-nav">
                    <form class="filter-form" action="{{ route('shop') }}" method="GET">
                        <button type="submit" class="button-nav" id="All">{{ __('All') }}</button>
                        <button type="submit" class="button-nav" name="category" id="Accesories"
                            value="Accesories">{{ __('Accesories') }}</button>
                        <button type="submit" class="button-nav" name="category" id="Balls"
                            value="Balls">{{ __('Balls') }}</button>
                        <button type="submit" class="button-nav" name="category" id="Clothes"
                            value="Clothes">{{ __('Clothes') }}</button>
                        <button type="submit" class="button-nav" name="category" id="Padelbat"
                            value="Padelbat">{{ __('Padelbat') }}</button>
                        <button type="submit" class="button-nav" name="category" id="Padelbatbag"
                            value="Padelbatbag">{{ __('Padelbatbag') }}</button>
                        <button type="submit" class="button-nav" name="category" id="Sportshoes"
                            value="Sportshoes">{{ __('Sportshoes') }}</button>
                    </form>
                </div>
            </div>
            <div class="col-9">
                <div class="row">
                    @foreach ($products as $item)
                        <div class="col-xs-12 col-lg-6 col-xxl-4 item-card {{ $item->category }}">
                            <div class="card text-center" style="width: 18rem;">
                                <img src={{ url('/images/shop/' . $item->url . '.jpg') }} class="card-img-center"
                                    alt="{{ $item->url }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ __($item->name) }}</h5>
                                    <h6 class="card-text">{{ __($item->category) }}</h6>
                                    <p class="card-brand">{{ __($item->brand) }}</p>
                                    <a href="{{ route('product', $item->id) }}"
                                        class="btn btn-primary">{{ __('Show more') }}</a>
                                    <form action="{{ route('cart.add') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                        <input type="submit" name="btn" class="btn btn-primary shop-cart"
                                            value="{{ __('Add to cart') }}">
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">{!! $products->links() !!}</div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    let windowWidth = window.outerWidth;
    if (windowWidth < 500) {
        document.body.style.zoom = "80%";
    } 
</script>
@endsection