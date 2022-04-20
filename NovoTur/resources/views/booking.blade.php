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
        @if (!isset($_GET['bookingDate']) || empty($_GET['bookingDate']))
            <label for="bookingDate" class="d-block my-2">{{ __('Select a date') }}:</label>
            <form>
                <input type="date" name="bookingDate" id="bookingDate">
                <input type="submit" value={{ __('Search') }}>
            </form>
        @else
            <div class="row" id="canchas">
                <label for="bookingDate" class="d-block my-2">{{ __('Select a date') }}:</label>
                <form>
                    @csrf
                    <input type="date" name="bookingDate" id="bookingDate" value="{{ $_GET['bookingDate'] }}">
                    <input type="submit" value={{ __('Search') }}>
                </form>
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
            <form action={{ route('booking') }} id="sendForm" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @foreach ($pitches as $pitch)
                    @if ($pitch->status != 'unavailable')
                        <input type="hidden" name="pitches[{{ $pitch->id }}]" value="">
                    @endif
                @endforeach
                <input type="hidden" name="date" value={{ $_GET['bookingDate'] }}>
                <label for="owner_name" class="d-block my-2">{{ __('Name')}}:</label>
                <input type="text" name="owner_name">
                <label for="owner_email" class="d-block my-2">{{ __('Email')}}:</label>
                <input type="email" name="owner_email">
                <input type="submit" class="d-block my-3" value={{ __('Book') }} id="send">
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
        console.log(appointments);
        let emptyAppointments = appointments.querySelectorAll(".bg-white");
        let picked;
        emptyAppointments.forEach(element => {
            element.addEventListener("click", (e) => {
                e.target.classList.toggle("bg-white");
                e.target.classList.toggle("bg-success");
                update();
            });
        });

        /* book.addEventListener("click", (e) => {
             e.preventDefault();
             window.location.href = FORM.action;
         });*/

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
                    console.log(fill.indexOf(element));
                    element.value = dates[fill.indexOf(element)].toString();
                }
            });
        }
    </script>
@endsection
