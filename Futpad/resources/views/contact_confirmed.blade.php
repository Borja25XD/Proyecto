@extends('.layouts/base')

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
    <link rel="stylesheet" href={{ asset('/css/cart.css?v=') . time() }}>
@endsection

@section('content')
    <div class="container bg-light rounded my-4  p-3">
        <div class="row">
            <div class="col-xs-12">
                <h3>{{ __('Message sended') }}</h3>
                <p>{{ __('We will answer you as soon as possible') }}.</p>
            </div>
        </div>
    </div>
@endsection
