@extends('.layouts/base')

@section('css')
    <link rel="stylesheet" href={{ asset('/css/style.css?v=') . time() }}>
    <link rel="stylesheet" href={{ asset('/css/contact.css?v=') . time() }}>
@endsection

@section('content')
    <div class="container bg-light rounded my-3">
        <h1 class="my-2">{{ __('Contact') }}</h1>
        <form method="POST" class="needs-validation" novalidate action="{{ route('contact') }}">
            @csrf
            @guest
                <div class="mb-3 px-2">
                    <label for="name" class="form-label">{{ __('Name') }}:</label>
                    @if (old('contact') == 'send')
                        @if ($errors->first('name'))
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" minlength="3" required>
                        @else
                            <input type="text" name="name" class="form-control is-valid" value="{{ old('name') }}"
                                minlength="3" required>
                        @endif
                    @else
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" minlength="3" required>
                    @endif
                    <div class="valid-feedback">
                        <p>{{ __('Looks good!') }}</p>
                    </div>
                </div>
                <div class="mb-3  px-2">
                    <label for="email">Email:</label>
                    <div class="input-group ">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email" class="form-control" aria-describedby="inputGroupPrepend"
                            value="{{ old('email') }}">
                    </div>
                    <p>{{ $errors->first('email') }}</p>
                </div>
            @else
                <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                <input type="hidden" name="name" value="{{ auth()->user()->name }}">

            @endguest
            <div class="mb-3 px-2">
                <label for="subject">{{ __('Subject') }}:</label>
                <input type="text" name="subject" class="form-control" value="{{ old('subject') }}" required>
                <p>{{ $errors->first('subject') }}</p>
            </div>
            <div class="mb-3 px-2">
                <label for="content">{{ __('Message') }}:</label>
                <textarea name="content" id="" rows="5" class="form-control" required>{{ old('content') }}</textarea>
                <p>{{ $errors->first('content') }}</p>
            </div>
            <input type="submit" class="btn btn-primary m-3" value="{{ __('Send') }}">
        </form>
    </div>
@endsection
