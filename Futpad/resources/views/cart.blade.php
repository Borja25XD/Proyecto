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
                    <th>{{__('ID')}}</th>
                    <th>{{__('NAME')}}</th>
                    <th>{{__('PRICE')}}</th>
                    <th>{{__('QUANTITY')}}</th>
                    <th>{{__('TOTAL PRICE')}}</th>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    @foreach (Cart::getContent() as $item)
                        <tr>
                            <td>{{$item->id}}</td>
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
                    <th colspan="4">TOTAL:</th>
                    <th class="total"><?php echo $total ?> €</th>
                </tfoot>
            </table>
            <button>{{__('Buy products')}}: <?php echo $total ?> €</button>

            @else
                <p>{{__('Empty shopping cart')}}</p>
           @endif

       </div>
       
    </div>
</div>
@endsection