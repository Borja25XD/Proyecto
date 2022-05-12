@extends(".layouts/base")

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
    <link rel="stylesheet" href={{ asset('/css/cart.css?v=') . time() }}>
@endsection

@section('content')
<div class="container">
    <div class="row">
       <div class="col-sm-12">
           <h1 class="title-cart">{{__('Shopping cart')}}</h1>
           @if (count(Cart::getContent()))
           <p class="description-cart">{{__('Review your order before pay:')}}</p>
            <table class="table table-striped">
                <thead>
                    <th>{{__('ID')}}</th>
                    <th>{{__('IMAGE')}}</th>
                    <th>{{__('NAME')}}</th>
                    <th>{{__('PRICE')}}</th>
                    <th>{{__('QUANTITY')}}</th>
                    <th>{{__('TOTAL PRICE')}}</th>
                    <th>{{__('REMOVE ITEM')}}</th>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    @foreach (Cart::getContent() as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td><img src={{ url('/images/shop/'  . $item->url . '.jpg' )}}  class="item-img" alt="{{$item->url}}"></td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->price}} €</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->price * $item->quantity}} €</td>
                            <?php $total += ($item->price * $item->quantity)?>
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
                <tfoot>
                    <th colspan="5">TOTAL:</th>
                    <th class="total"><?php echo $total ?> €</th>
                    <th></th>
                </tfoot>
            </table>
            <button class="buy-button">{{__('Buy products')}}: <?php echo $total ?> €</button>

            @else
                <span class="empty-cart">{{__('Empty shopping cart')}}</span>
           @endif

       </div>
       
    </div>
</div>
@endsection