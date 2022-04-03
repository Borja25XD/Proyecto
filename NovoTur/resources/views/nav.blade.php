<nav>
    <div class="float-end">
    <ul class="nav bg-emerald-300">
        <li class="nav-item"><a class=" nav-link {{ setActive('home') }}"
                href={{ route('home') }}>{{ __('Home') }}</a>
        </li>
        <li class="nav-item"><a class="nav-link {{ setActive('contact') }}"
                href={{ route('contact') }}>{{ __('Contact') }}</a></li>
        @guest
            <li class="nav-item"><a class="nav-link {{ setActive('register') }}"
                    href={{ route('register') }}>{{ __('Register') }}</a></li>
            <li class="nav-item"><a class="nav-link {{ setActive('login') }}" href={{ route('login') }}>
                    {{ __('Login') }}</a>
            </li>
        @else
            <li class="nav-item"><a class="nav-link" href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            </li>
        @endguest
    </ul>
</div>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
