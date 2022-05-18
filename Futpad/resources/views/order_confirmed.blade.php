@extends('.layouts/base')

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
    <link rel="stylesheet" href={{ asset('/css/cart.css?v=') . time() }}>
@endsection

@section('content')
    <div class="container bg-light rounded my-4  p-3">
        <div class="row">
            <div class="col-xs-12">
                @auth
                    <h3>{{ __('Successfull order') }}</h3>
                    <p><p>{{ __('You can check your orders on') }} <a href="{{ route('dashboard') }}">{{ __('Orders') }}</a>
                        {{ __('in your profile') }}.</p>
                @endauth
            </div>
        </div>
    </div>
@endsection
