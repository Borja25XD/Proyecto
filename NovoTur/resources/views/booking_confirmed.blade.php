@extends(".layouts/base")

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
    <link rel="stylesheet" href={{ asset('/css/booking_confirmed.css?v=') . time() }}>
@endsection

@section('js')
@endsection

@section('content')
    <div class="container bg-white  p-3 my-5">
        @if (empty($failed))
            <h3>{{ __('Your booking has been submitted correctly') }}.</h3>
        @else
            <h3>{{ __('An error ocurred with some of your bookings') }}:</h3>
            @php
                $date = explode('-', $failed[0]);
                $date = array_reverse($date);
            @endphp
            <h5>{{ __('Date') }}: {{ $date[0] . '-' . $date[1] . '-' . $date[2] }}</h5>
            @for ($i = 0; $i < count($failed); $i = $i + 3)
                <p>{{ __('Pitch') }} {{ $failed[$i + 1] }}, {{ __('hour') }} {{ $failed[$i + 2] }}:00</p>
            @endfor
            <p>{{ __('Selected hours not valid') }}.</p>
        @endif
        @auth
            <p>{{ __('You can check your bookings on') }} <a href="{{ route('dashboard') }}">{{ __('Bookings') }}</a>
                {{ __('in your profile') }}.</p>
        @endauth
        <p><a href="{{ route('booking') }}">{{ __('Make a new booking') }}</a></p>

    </div>
@endsection

@section('script')
@endsection
