@extends(".layouts/base")

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
    <link rel="stylesheet" href={{ asset('/css/booking.css?v=') . time() }}>
@endsection

@section('js')
    <script src={{ url('/js/index.js?v=') . time() }} defer></script>
@endsection

@section('content')
    <div class="container">
        <h1>{{ __('Book your padbol pitch') }}</h1>
        @if (!isset($_GET['bookingDate']))
            <label for="bookingDate" class="d-block my-2">{{ __('Select a date') }}:</label>
            <form>
                @csrf
                <input type="date" name="bookingDate" id="bookingDate">
                <input type="submit" value={{ __('Search') }}>
            </form>
        @else
            <div class="row">
                @foreach ($pitches as $pitch)
                    @if ($pitch->status != 'unavailable')
                        <label class="d-block my-2">{{ __('Pitch') }} {{ $pitch->id }}</label>
                        <div class="d-inline my-1 col-12" id={{ $pitch->id }}>
                            <label class="d-block my-2">{{ __('Morning') }}</label>
                            @foreach ($hours as $hour)
                                @if ($hour == 17)
                                    <label class="d-block my-2">{{ __('Evening') }}</label>
                                @endif
                                <div class="d-inline-block bg-white col-2 text-center appointment">{{ $hour }}:00</div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
@endsection
