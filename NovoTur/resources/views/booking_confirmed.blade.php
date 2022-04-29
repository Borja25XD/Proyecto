@extends(".layouts/base")

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
@endsection

@section('js')
@endsection

@section('content')
    <div class="container">
        <h3>Su reserva se ha realizado con éxito</h3>
        @auth
            <p>Puede verla en el apartado <a href="{{ route('dashboard') }}">Reservas</a> de su perfil</p>
        @endauth
    </div>
@endsection

@section('script')
@endsection
