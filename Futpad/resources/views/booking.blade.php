@extends(".layouts/base")

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
    <link rel="stylesheet" href={{ asset('/css/booking.css?v=') . time() }}>
@endsection

@section('js')
    <script src={{ url('/js/index.js?v=') . time() }} defer></script>
@endsection

@section('content')
    <div id="bookingBox" class="container bg-light rounded my-4 p-3">
        <h1>{{ __('Book your padbol pitch') }}</h1>
        <img  class="mx-2" id="pitchImg" src="{{ url('/images/pitch.jpg') }}" alt="">
        @if (!isset($_GET['bookingDate']) || empty($_GET['bookingDate']))
            <label for="bookingDate" class="d-block m-2">{{ __('Select a date') }}:</label>
            <form class="mx-2">
                <input type="date" name="bookingDate" id="bookingDate">
                <input type="submit" value="{{ __('Search') }}" class="btn btn-primary">
            </form>
        @else
            <div class="row" id="canchas">
                <label for="bookingDate" class="d-block m-3">{{ __('Select a date') }}:</label>
                <form class="mx-3">
                    @csrf
                    <input type="date" name="bookingDate" id="bookingDate" value="{{ $_GET['bookingDate'] }}">
                    <input type="submit" value="{{ __('Search') }}" class="btn btn-primary">
                </form>
                <?php
                $bookings = DB::select(DB::raw('SELECT * FROM  bookings WHERE date = :variable'), ['variable' => $_GET['bookingDate']]);
                ?>
                @foreach ($pitches as $pitch)
                    @if ($pitch->status != 'unavailable')
                        <label class="d-block pitchLabel mx-3">{{ __('Pitch') }} {{ $pitch->id }}</label>
                        <div class="d-inline my-1 mx-3 col-12" id="Cancha{{ $pitch->id }}">
                            <label class="d-block m-2">{{ __('Morning') }}</label>
                            @foreach ($hours as $hour)
                                <?php $triggered = 0; ?>
                                @if ($hour == 17)
                                    <label class="d-block m-2">{{ __('Evening') }}</label>
                                @endif
                                @foreach ($bookings as $booking)
                                    @if ($booking->hour == $hour && $pitch->id == $booking->pitch_id)
                                        <?php $triggered = 1; ?>
                                        <div class="d-inline-block bg-danger col-2 text-center appointment"
                                            pitch="{{ $pitch->id }}">
                                            {{ $hour }}:00
                                        </div>
                                    @endif
                                @endforeach
                                @if ($triggered == 0)
                                    <div class="d-inline-block bg-white col-2 text-center appointment"
                                        pitch="{{ $pitch->id }}">
                                        {{ $hour }}:00
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
            <form class="my-4" action={{ route('booking') }} id="sendForm" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @foreach ($pitches as $pitch)
                    @if ($pitch->status != 'unavailable')
                        <input type="hidden" name="pitches[{{ $pitch->id }}]" value="">
                    @endif
                @endforeach
                <input type="hidden" name="date" value={{ $_GET['bookingDate'] }}>
                @auth
                    <input type="hidden" name="owner_name" value="{{ auth()->user()->name }}" required>
                    <input type="hidden" name="owner_email" value="{{ auth()->user()->email }}" required>
                @endauth
                @guest
                    <label for="owner_name" class="d-block my-2 form-label">{{ __('Name') }}:</label>
                    <input class="form-control" type="text" name="owner_name" placeholder="" required>
                    <label for="owner_email" class="d-block my-2 form-label">{{ __('Email') }}:</label>
                    <input class="form-control" type="email" name="owner_email" placeholder="name@example.com" required>
                @endguest
                <input type="submit" class="d-block my-3 btn btn-primary" value="{{ __('Book') }}" id="send">
            </form>
        @endif
    </div>
@endsection

@section('script')
    <script>
        let FORM = document.querySelector("#sendForm");
        let inputs = FORM.querySelectorAll("input[type=hidden]");
        let appointments = document.querySelector("#canchas");
        let book = document.querySelector("#send");
        let emptyAppointments = appointments.querySelectorAll(".bg-white");
        let picked;
        emptyAppointments.forEach(element => {
            element.addEventListener("click", (e) => {
                e.target.classList.toggle("bg-white");
                e.target.classList.toggle("bg-success");
                update();
            });
        });

        function update() {
            picked = appointments.querySelectorAll(".bg-success");
            picked = [...picked];
            dates = [];
            picked.forEach(element => {
                if (dates[element.attributes[1].value] == undefined) {
                    dates[element.attributes[1].value] = element.innerText.split(":")[0] + ",";
                } else {
                    dates[element.attributes[1].value] += element.innerText.split(":")[0] + ",";
                }
            });
            dates.forEach(element => {
                if (element != undefined) {
                    algo = element.split(",");
                    algo.pop();
                    dates[dates.indexOf(element)] = algo;
                }
            });
            fill = [...inputs];
            fill.forEach(element => {
                if (fill.indexOf(element) != 0 && dates[fill.indexOf(element)] != undefined) {
                    element.value = dates[fill.indexOf(element)].toString();
                }
            });
        }
    </script>
@endsection
