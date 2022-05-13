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
                    <button class="nav-link @if (!isset($bookings)) @php echo "active" @endphp @endif"
                        id="v-pills-home-tab" data-bs-toggle="tab" data-bs-target="#v-pills-home" type="button" role="tab"
                        aria-controls="v-pills-home" aria-selected="true">{{ __('Account information') }}</button>
                    <button class="nav-link @if (isset($bookings)) @php echo "active" @endphp @endif"
                        id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="buttn" role="tab"
                        aria-controls="v-pills-profile" aria-selected="false"> {{ __('Bookings') }}</button>
                    @if (auth()->user()->type == 'admin')
                        <button class="nav-link @if (isset($bookings)) @php echo "active" @endphp @endif"
                            id="v-pills-pitches-tab" data-bs-toggle="pill" data-bs-target="#v-pills-pitches" type="buttn"
                            role="tab" aria-controls="v-pills-pitches" aria-selected="false"> {{ __('Pitches') }}</button>
                    @endif
                </div>
                <div class="tab-content col-10" id="v-pills-tabContent">
                    <div class="tab-pane fade  @if (!isset($bookings)) @php echo "show active" @endphp @endif bg-white"
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
                    <div class="tab-pane fade bg-white @if (isset($bookings)) @php echo "show active" @endphp @endif"
                        id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        @php
                            $bookings = DB::select(DB::raw('SELECT * FROM  bookings WHERE owner_email = :variable AND date >= :date ORDER BY date,hour'), ['variable' => auth()->user()->email, 'date' => date('Y-m-d')]);
                            $unavailablePitches = DB::select(DB::raw('SELECT id FROM pitches WHERE status = "unavailable"'));
                            $currentDateYear = date('Y');
                            $currentDateMonth = date('m');
                            $currentDateDay = date('d');
                            $currentHour = date('h');
                            $cancelMessage = 0;
                            foreach ($bookings as $key => $value) {
                                if ($value->hour <= $currentHour && $value->date == date('Y-m-d')) {
                                    unset($bookings[$key]);
                                }
                                foreach ($unavailablePitches as $keyP => $pitch) {
                                    if ($pitch->id == $value->pitch_id) {
                                        unset($bookings[$key]);
                                        $cancelMessage = 1;
                                    }
                                }
                            }
                        @endphp
                        <div class="container col-12">
                            <h4>{{ __('Active bookings') }}:</h4>
                            @if (empty($bookings))
                                <div class="row px-3">
                                    <div class="col-12 p-3">
                                        <p>{{ __('No active bookings') }}.</p>
                                        @if ($cancelMessage)
                                            <p>
                                                {{ __('We are sorry, some of your bookings were canceled due to changes on the pitches availability, you can contact us') }}
                                                <a href="{{ route('contact') }}">{{ __('here') }}</a>
                                                {{ __('for more information') }}.
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            @else
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Date') }}</th>
                                            <th>{{ __('Hour') }}</th>
                                            <th>{{ __('Pitch') }}</th>
                                            <th>{{ __('Options') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookings as $key => $value)
                                            <tr>
                                                @php
                                                    $dbDate = explode('-', $value->date);
                                                @endphp
                                                @if ($dbDate[0] >= $currentDateYear && $dbDate[1] >= $currentDateMonth && $dbDate[2] >= $currentDateDay)
                                                    <td> @php
                                                        echo date('d-m-Y', strtotime($value->date));
                                                    @endphp </td>
                                                    <td>{{ $value->hour }}:00</td>
                                                    <td>{{ $value->pitch_id }}</td>
                                                    <td>
                                                        <form method="POST" action="{{ route('delete') }}">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <input type="hidden" name="date" value="{{ $value->date }}">
                                                            <input type="hidden" name="hour" value="{{ $value->hour }}">
                                                            <input type="hidden" name="pitch" value="{{ $value->pitch_id }}">
                                                            <input type="submit" class="btn btn-danger" value="X">
                                                        </form>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                    @if (auth()->user()->type == 'admin')
                        <div class="tab-pane fade bg-white p-3" id="v-pills-pitches" role="tabpanel"
                            aria-labelledby="v-pills-pitches-tab">
                            <div class="container col-12">
                                <h4>{{ __('Manage status') }}:</h4>
                                <?php
                                $pitches = DB::select(DB::raw('SELECT * FROM  pitches '));
                                ?>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Number') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Options') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pitches as $key => $pitch)
                                            <tr>
                                                <td>{{ $pitch->id }}</td>
                                                <td>{{ __($pitch->status) }}</td>
                                                <td>
                                                    @if ($pitch->status == 'available')
                                                        <form method="POST" action="{{ route('editdisp') }}">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <input type="hidden" name="id" value="{{ $pitch->id }}">
                                                            <input type="hidden" name="availability"
                                                                value="{{ $pitch->status }}">
                                                            <input type="submit" class="btn btn-danger"
                                                                value="{{ __('No available') }}">
                                                        </form>
                                                    @else
                                                        <form method="POST" action="{{ route('editdisp') }}">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <input type="hidden" name="id" value="{{ $pitch->id }}">
                                                            <input type="hidden" name="availability"
                                                                value="{{ $pitch->status }}">
                                                            <input type="submit" class="btn btn-success"
                                                                value="{{ __('Available') }}">
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endauth
    </div>
@endsection

@section('script')
@endsection