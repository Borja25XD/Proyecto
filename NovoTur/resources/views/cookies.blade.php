@extends(".layouts/base")

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
@endsection

@section('content')
    <div class="container">
        <h1>Página de las cookies</h1>
    </div>
@endsection
