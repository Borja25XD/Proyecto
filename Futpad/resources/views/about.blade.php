@extends(".layouts/base")

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
    <link rel="stylesheet" href={{ asset('/css/about.css?v=') . time() }}>
@endsection

@section('content')
    <div class="container  bg-light rounded my-4  p-3">
        <h1>{{__('About us')}}</h1>
        <img class="aboutus-img" src="{{url('images/pitch2.jpg')}}">
        <p class="aboutus-text">{{__('We are a small company in the south of the island that is dedicated to the rental of paddle and padbol courts. We also have a store that allows our users to purchase sports equipment at any time. For any questions or queries, do not hesitate to contact us.')}}</p>
        <div class="location">
            <span class="location-text">{{__('Our facilities are specifically located in the Las Chafiras industrial estate, in the municipality of San Miguel de Abona. Perfectly located, with ample parking.')}}</span>
            <img class="location-img" src="{{url('images/ubi.png')}}">
        </div>
    </div>
@endsection
