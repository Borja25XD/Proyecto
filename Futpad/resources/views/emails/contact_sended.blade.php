<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $subject }}</title>
</head>

<body>
    <h2>{{ __('Contact from form') }}:</h2>
    <h3>From: {{ $author }}</h3>
    <p>{{ $msg }}</p>
</body>

</html>
