@extends('.layouts/base')

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
@endsection

@section('content')
<div class="container p-0">
    <h1>Página de inicio de Futpad</h1>
</div>
@endsection
