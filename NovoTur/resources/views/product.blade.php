@extends(".layouts/base")

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
    {{-- Aqui puedes poner otro css específico para cada producto --}}
@endsection

@section('content')
    {{-- Info del producto --}}
@endsection