@extends(".layouts/base")

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
@endsection

@section('content')
    <div class="container">
        <h1>{{ __('Preferences') }}</h1>
        @auth
            <h2>{{ __('Welcome') }} {{ auth()->user()->name }}</h2>
            <form method="POST">
                @csrf
                <div class="mb-3">
                    <label for="lang">{{ __('Language') }}:</label>
                    <select name="lang" class="form-select">
                        <option value="es">{{ __('Spanish') }}</option>
                        <option value="en">{{ __('English') }}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pageSize" class="form-label">
                        {{ __('Articles per page') }}:</label>
                    <input type="number" class="form-control" min="1">
                </div>
                @if (auth()->user()->type == 'admin')
                    <div class="mb-3 ">
                        <label for="shop">{{ __('Shop') }}:</label>
                        <select name="shop" class="form-select">
                            @foreach ($shops as $shop)
                                <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
            </form>
        @endauth
    </div>
@endsection
