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
                <?php
                $bookings = DB::select(DB::raw('SELECT * FROM  bookings WHERE date = :variable'), ['variable' => $_GET['bookingDate']]);
                ?>
                @foreach ($pitches as $pitch)
                    @if ($pitch->status != 'unavailable')
                        <label class="d-block my-2">{{ __('Pitch') }} {{ $pitch->id }}</label>
                        <div class="d-inline my-1 col-12" id="Cancha{{ $pitch->id }}">
                            <label class="d-block my-2">{{ __('Morning') }}</label>
                            @foreach ($hours as $hour)
                                <?php $triggered = 0; ?>
                                @if ($hour == 17)
                                    <label class="d-block my-2">{{ __('Evening') }}</label>
                                @endif
                                @foreach ($bookings as $booking)
                                    @if ($booking->hour == $hour && $pitch->id == $booking->pitch_id)
                                        <?php $triggered = 1; ?>
                                        <div class="d-inline-block bg-danger col-2 text-center appointment">
                                            {{ $hour }}:00
                                        </div>
                                    @endif
                                @endforeach
                                @if ($triggered == 0)
                                    <div class="d-inline-block bg-white col-2 text-center appointment">
                                        {{ $hour }}:00
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
            <form>
                <input type="hidden" value="">
                <input type="submit" value={{ __('Book') }}>
            </form>
        @endif
    </div>
@endsection

@section('script')
    <script>
        let appointments = document.querySelector("#Cancha1");
        console.log(appointments);
        appointments = appointments.querySelectorAll(".bg-white");
        appointments.forEach(element => {
            element.addEventListener("click", (e) => {
                e.target.classList.toggle("bg-white");
                e.target.classList.toggle("bg-success");
            });
        });
    </script>
@endsection
