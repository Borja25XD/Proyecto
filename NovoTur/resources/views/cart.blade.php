@extends(".layouts/base")

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
@endsection

@section('content')
<div class="container">
    <div class="row">
       <div class="col-sm-12 bg-light">
           @if (count(Cart::getContent()))
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>CANTIDAD</th>
                </thead>
                <tbody>
                    @foreach (Cart::getContent() as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>
                                <form action="{{route('cart.removeitem')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <button type="submit" class="btn btn-link btn-sm text-danger">x</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @else
                <p>Carrito vacio</p>
           @endif

       </div>
       
    </div>
</div>
    {{-- @if(count(\Cart::getContent()) > 0)
        @foreach(\Cart::getContent() as $item)
            <li class="list-group-item">
                <div class="row">
                    <div class="col-lg-3">
                        <img src="/images/{{ $item->attributes->image }}"
                            style="width: 50px; height: 50px;"
                        >
                    </div>
                    <div class="col-lg-6">
                        <b>{{$item->name}}</b>
                        <br><small>Qty: {{$item->quantity}}</small>
                    </div>
                    <div class="col-lg-3">
                        <p>${{ \Cart::get($item->id)->getPriceSum() }}</p>
                    </div>
                    <hr>
                </div>
            </li>
        @endforeach
        <br>
        <li class="list-group-item">
            <div class="row">
                <div class="col-lg-10">
                    <b>Total: </b>${{ \Cart::getTotal() }}
                </div>
                <div class="col-lg-2">
                    <form action="{{ route('cart.clear') }}" method="POST">
                        {{ csrf_field() }}
                        <button class="btn btn-secondary btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                </div>
            </div>
        </li>
        <br>
        <div class="row" style="margin: 0px;">
            <a class="btn btn-dark btn-sm btn-block" href="{{ route('cart.index') }}">
                CARRITO <i class="fa fa-arrow-right"></i>
            </a>
            <a class="btn btn-dark btn-sm btn-block" href="">
                CHECKOUT <i class="fa fa-arrow-right"></i>
            </a>
        </div>
    @else
        <li class="list-group-item">Tu carrito esta vacío</li>
    @endif --}}
@endsection