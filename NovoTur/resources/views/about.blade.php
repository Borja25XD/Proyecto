@extends(".layouts/base")

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
@endsection

@section('content')
    <div class="container">
        <h1>Página de about</h1>
    </div>
@endsection
