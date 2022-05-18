<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Order') }}</title>
</head>

<body>
    <h2>{{ __('Order details') }}:</h2>
    @php
        $orders = DB::select(DB::raw('SELECT * FROM  orders WHERE user_id = :variable AND order_id = :var2 '), ['variable' => auth()->user()->id, 'var2' => $order_id]);
    @endphp
    @if (empty($orders))
        <p class="offset-1 py-3">{{ __("You don't have any orders at the moment") }}</p>
    @else
        @foreach ($orders as $order)
            @php
                $orderItems = DB::select(DB::raw('SELECT * FROM  orders INNER JOIN order_details ON orders.order_id = order_details.order_id  INNER JOIN products on order_details.product_id = products.id WHERE user_id = :variable AND order_details.order_id = :var2'), ['variable' => auth()->user()->id, 'var2' => $order_id]);
            @endphp
            <table class="table table-striped">
                <thead>
                    <th>{{ __('ID') }}</th>
                    <th>{{ Str::upper(__('Name')) }}</th>
                    <th>{{ Str::upper(__('Price')) }}</th>
                    <th>{{ Str::upper(__('Quantity')) }}</th>
                    <th>{{ Str::upper(__('Total price')) }}</th>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                        $first = true;
                    @endphp
                    @foreach ($orderItems as $item)
                        <tr>
                            @if ($first)
                                @php
                                    $first = false;
                                @endphp
                                <td rowspan="{{ count($orderItems) }}">{{ $order->order_id }}</td>
                            @endif
                            @php
                                $product = DB::select(DB::raw('SELECT * FROM products WHERE id = :variable'), ['variable' => $item->product_id]);
                            @endphp
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }} &euro;</td>
                            <td class="ProductQty">{{ $item->quantity }}</td>
                            <td>{{ $item->price * $item->quantity }} &euro;</td>
                            @php
                                $total += $item->price * $item->quantity;
                            @endphp
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <th colspan="4">TOTAL:</th>
                    <th class="total"><?php echo $total; ?> &euro;</th>
                    <th></th>
                </tfoot>
            </table>
        @endforeach
    @endif
</body>

</html>
