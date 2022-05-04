<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Booking') }}</title>
</head>

<body>
    <h2>{{ __('Booking data') }}:</h2>
    @php
        $date = explode('-', $bookingData[0]);
        $date = array_reverse($date);
    @endphp
    <h4>{{ __('Date') }}: {{ $date[0] . '-' . $date[1] . '-' . $date[2] }}</h4>
    <ul>
    @for ($i = 0; $i < count($bookingData); $i = $i + 3)
        <li>{{ __('Pitch') }} {{ $bookingData[$i + 1] }}, {{ __('hour') }} {{ $bookingData[$i + 2] }}:00</li>
    @endfor
    <ul>
</body>

</html>
