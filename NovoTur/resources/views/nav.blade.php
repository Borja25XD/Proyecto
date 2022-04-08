<nav class="navbar-expand-md navbar-light bg-white shadow-sm ">
    <div class="row gx-5">
        <div class="col-12">
            <ul class="nav">
                <a  href={{ route('home') }}>
                    <img class="col-12" src={{ url('/images/Futpadlogo.png') }} alt="{{ __('Logo de Futpad') }}" height="90px">
                </a>
                <li class="nav-item offset-md-3 offset-lg-5 offset-xl-6">
                    <a class=" nav-link {{ setActive('home') }} {{ setActiveT('/') }}" href={{ route('home') }}>
                        {{ __('Home') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('contact') }}" href={{ route('contact') }}>
                        {{ __('Contact') }}
                    </a>
                </li>
                @guest
                    <li class="nav-item"><a class="nav-link {{ setActive('register') }}"
                            href={{ route('register') }}>{{ __('Register') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ setActive('login') }}" href={{ route('login') }}>
                            {{ __('Login') }}
                        </a>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    </li>
                @endguest
            </ul>
        </div>

    </div>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
