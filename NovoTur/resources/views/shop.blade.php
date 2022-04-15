@extends(".layouts/base")

@section('content')
    <div class="container">
        <h1>Página de la tienda</h1>
        @foreach($products as $product)
            <div class="card" style="width: 18rem;">
                <h5 class="card-title">{{$product->name}}</h5>
                <p class="card-text">{{$product->description}}</p>
            </div>
        @endforeach

       
        {{-- @foreach($product as $prod)
            <div class="card" style="width: 18rem;">
                <img src="img/guntherrall.jpg" class="card-img-top img-fluidS">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
        @endforeach --}}
    </div>
@endsection
