@extends(".layouts/base")

@section('content')
    <h1>{{ __('Contact') }}</h1>
    <div class="container">
        <form method="POST" class="needs-validation" novalidate action="{{ route('contact') }}">
            @csrf
            <div class="mb-3">
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
            <div class="mb-3">
                <label for="email">Email:</label>
                <div class="input-group ">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="text" name="email" class="form-control" aria-describedby="inputGroupPrepend"
                        value="{{ old('email') }}">
                </div>
                <p>{{ $errors->first('email') }}</p>
            </div>
            <div class="mb-3">
                <label for="subject">{{ __('Subject') }}:</label>
                <input type="text" name="subject" class="form-control" value="{{ old('subject') }}">
                <p>{{ $errors->first('subject') }}</p>
            </div>
            <div class="mb-3">
                <label for="content">{{ __('Message') }}:</label>
                <textarea name="content" id="" rows="5" class="form-control">{{ old('content') }}</textarea>
                <p>{{ $errors->first('content') }}</p>
            </div>
            <div class="mb-3">
                <label for="lang">{{ __('Language') }}:</label>
                <select name="lang" class="form-select">
                    <option value="es">{{ __('Español') }}</option>
                    <option value="en">{{ __('Inglés') }}</option>
                </select>
            </div>
            <button class="btn btn-primary" name="contact" value="send">Enviar</button>
        </form>
    </div>
@endsection
