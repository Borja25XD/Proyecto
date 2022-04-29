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
                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="tab" data-bs-target="#v-pills-home"
                        type="button" role="tab" aria-controls="v-pills-home"
                        aria-selected="true">{{ __('Account information') }}</button>
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                        aria-selected="false">Profile</button>
                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages"
                        aria-selected="false">Messages</button>
                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings"
                        aria-selected="false">Settings</button>
                </div>
                <div class="tab-content col-10" id="v-pills-tabContent">
                    <div class="tab-pane fade show active bg-white" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab">
                        <div class="offset-2">
                            <p>{{ __('Email') }}:</p>
                            <div class="offset-1 data">{{ auth()->user()->email }}</div>
                            <p>{{ __('Name') }}:</p>
                            <div class="offset-1 data">{{ auth()->user()->name }}</div>
                            <p>{{ __('Phone') }}:</p>
                            <div class="offset-1 data">{{ auth()->user()->phone }}</div>
                        </div>
                    </div>
                    <div class="tab-pane fade bg-white" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">...
                    </div>
                    <div class="tab-pane fade bg-white" id="v-pills-messages" role="tabpanel"
                        aria-labelledby="v-pills-messages-tab">...
                    </div>
                    <div class="tab-pane fade bg-white" id="v-pills-settings" role="tabpanel"
                        aria-labelledby="v-pills-settings-tab">...
                    </div>
                </div>
            </div>
        @endauth
    </div>
@endsection

@section('script')
    <script>

    </script>
@endsection
