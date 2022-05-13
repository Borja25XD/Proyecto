@extends(".layouts/base")

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
    <link rel="stylesheet" href={{ asset('/css/cart.css?v=') . time() }}>
@endsection

@section('content')
    <div class="container bg-light rounded my-4  p-3">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="title-cart">{{ __('Shopping cart') }}</h1>
                @if (count(Cart::getContent()))
                    <p class="description-cart">{{ __('Review your order before pay:') }}</p>
                    <table class="table table-striped">
                        <thead>
                            <th>{{ __('ID') }}</th>
                            <th>{{ Str::upper(__('Image')) }}</th>
                            <th>{{ Str::upper(__('Name')) }}</th>
                            <th>{{ Str::upper(__('Price')) }}</th>
                            <th>{{ Str::upper(__('Quantity')) }}</th>
                            <th>{{ Str::upper(__('Total price')) }}</th>
                            <th>{{ Str::upper(__('Remove item')) }}</th>
                        </thead>
                        <tbody>
                            <?php $total = 0; ?>
                            @foreach (Cart::getContent() as $item)
                                @php
                                    $url = DB::select(DB::raw('SELECT url FROM  products WHERE id = :variable'), ['variable' => $item->id]);
                                @endphp
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td><img src={{ url('/images/shop/' . $url[0]->url . '.jpg') }} class="item-img"
                                            alt="{{ $item->url }}"></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->price }} &euro;</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->price * $item->quantity }} &euro;</td>
                                    <?php $total += $item->price * $item->quantity; ?>
                                    <td>
                                        <form action="{{ route('cart.removeitem') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-link btn-sm text-danger">x</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <th colspan="5">TOTAL:</th>
                            <th class="total"><?php echo $total; ?> &euro;</th>
                            <th></th>
                        </tfoot>
                    </table>
                    <button class="buy-button">{{ __('Buy products') }}: <?php echo $total; ?> &euro;</button>
                @else
                    <p class="empty-cart">{{ __('Empty shopping cart') }}</p>
                @endif

            </div>

        </div>
    </div>
@endsection
