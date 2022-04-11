<div class="row border-top mx-0 px-4">
    <ul class="col-4 list-unstyled">
        <label class="my-2"> {{ __('Customer support') }} </label>
        @guest
            <li class="my-2">
                <a class="text-decoration-none" href={{ route('login') }}> {{ __('Manage account') }}</a>
            </li>
        @endguest
        @auth
            <li class="my-2">
                <a class="text-decoration-none" href={{ route('dashboard') }}> {{ __('Manage account') }}</a>
            </li>
        @endauth
        <li class="my-2">
            <a class="text-decoration-none" href={{ route('contact') }}> {{ __('Contact') }}</a>
        </li>
    </ul>
    <ul class="col-4 list-unstyled">
        <label class="my-2">Futpad</label>
        <li class="my-2">
            <a class="text-decoration-none" href={{ route('about') }}> {{ __('About Futpad') }}</a>
        </li>
        <li class="my-2">
            <a class="text-decoration-none" href={{ route('about') }}> {{ __('Location') }}</a>
        </li>
        <li class="my-2">
            <a class="text-decoration-none" href={{ route('cookies') }}> {{ __('Cookies policy') }}</a>
        </li>
    </ul>
    <ul class="col-4 list-unstyled">
        <label class="my-2"> {{ __('Services') }} </label>
        <li class="my-2">
            <a class="text-decoration-none" href="{{ route('shop') }}"> {{ __('Shop') }} </a>
        </li>
        <li class="my-2">
            <a class="text-decoration-none" href="{{ route('booking') }}"> {{ __('Booking') }} </a>
        </li>
    </ul>
</div>
