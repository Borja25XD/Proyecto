@extends(".layouts/base")

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
    <link rel="stylesheet" href={{ asset('/css/dashboard.css?v=') . time() }}>
@endsection

@section('content')
    <div class="container">
        @auth
            <h2>{{ __('Welcome') }} {{ auth()->user()->name }}</h2>
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link @if (!isset($algo)) @php echo "active" @endphp @endif"
                        id="v-pills-home-tab" data-bs-toggle="tab" data-bs-target="#v-pills-home" type="button" role="tab"
                        aria-controls="v-pills-home" aria-selected="true">{{ __('Account information') }}</button>
                    <button class="nav-link @if (isset($algo)) @php echo "active" @endphp @endif"
                        id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="buttn" role="tab"
                        aria-controls="v-pills-profile" aria-selected="false"> {{ __('Bookings') }}</button>
                </div>
                <div class="tab-content col-10" id="v-pills-tabContent">
                    <div class="tab-pane fade  @if (!isset($algo)) @php echo "show active" @endphp @endif bg-white"
                        id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="offset-1">
                            <h4>{{ __('Email') }}:</h4>
                            <div class="offset-1 data">{{ auth()->user()->email }}</div>
                            <h4>{{ __('Name') }}:</h4>
                            <div class="offset-1 data">{{ auth()->user()->name }}</div>
                            <h4>{{ __('Phone') }}:</h4>
                            <div class="offset-1 data">{{ auth()->user()->phone }}</div>
                        </div>
                    </div>
                    <div class="tab-pane fade bg-white @if (isset($algo)) @php echo "show active" @endphp @endif"
                        id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                        <?php
                        $bookings = DB::select(DB::raw('SELECT * FROM  bookings WHERE owner_email = :variable ORDER BY date,hour'), ['variable' => auth()->user()->email]);
                        $currentDateYear = date('Y');
                        $currentDateMonth = date('m');
                        $currentDateDay = date('d');
                        
                        ?>
                        <div class="container col-12">
                            <h4>{{ __('Active bookings') }}:</h4>
                            @foreach ($bookings as $key => $value)
                                @php
                                    $dbDate = explode('-', $value->date);
                                @endphp
                                @if ($dbDate[0] >= $currentDateYear && $dbDate[1] >= $currentDateMonth && $dbDate[2] >= $currentDateDay)
                                    <div class="row px-3">
                                        <div class="col-4">
                                            <h5>{{ __('Date') }}:</h5>
                                            <p> @php
                                                echo date('d-m-Y', strtotime($value->date));
                                            @endphp </p>
                                        </div>
                                        <div class="col-2">
                                            <h5>{{ __('Hour') }}:</h5>
                                            <p>{{ $value->hour }}:00</p>
                                        </div>
                                        <div class="col-2">
                                            <h5>{{ __('Pitch') }}:</h5>
                                            <p>{{ $value->pitch_id }}</p>
                                        </div>
                                        <div id="options" class="col-1">
                                            <h5>{{ __('Options') }}:</h5>
                                            <form method="POST" action="{{ route('delete') }}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="date" value="{{ $value->date }}">
                                                <input type="hidden" name="hour" value="{{ $value->hour }}">
                                                <input type="hidden" name="pitch" value="{{ $value->pitch_id }}">
                                                <input type="submit" class="btn btn-danger" value="X">
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endauth
    </div>
@endsection

@section('script')

@endsection
