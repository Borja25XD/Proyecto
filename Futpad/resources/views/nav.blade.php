<nav class="navbar-expand-md navbar-light bg-white shadow-sm ">
    <div class="row m-0">
        <ul class="nav">
            <a href={{ route('home') }}>
                <img class="col-12" src={{ url('/images/Futpadlogo.png') }} alt="{{ __('Logo de Futpad') }}"
                    height="80px">
            </a>
            <li class="nav-item offset-md-1 offset-lg-3 offset-xl-4 col-1">
                <a class="nav-link {{ setActive('shop') }}" href={{ route('shop') }}>
                    {{ __('Shop') }}
                </a>
            </li>
            <li class="nav-item col-1">
                <a class=" nav-link {{ setActive('booking') }}" href={{ route('booking') }}>
                    {{ __('Booking') }}
                </a>
            </li>
            @guest
                <li class="nav-item col-1"><a class="nav-link {{ setActive('register') }}"
                        href={{ route('register') }}>{{ __('Register') }}</a>
                </li>
                <li class="nav-item col-2">
                    <a class="nav-link {{ setActive('login') }}" href={{ route('login') }}>
                        {{ __('Login') }}
                    </a>
                </li>
            @else
                @if (auth()->user()->type == 'admin')
                    <li class="nav-item col-1"><a class="nav-link"
                            href={{ route('dashboard') }}>{{ __('Manage') }}</a>
                    </li>
                @else
                    <li class="nav-item col-1"><a class="nav-link"
                            href={{ route('dashboard') }}>{{ __('My account') }}</a>
                    </li>
                @endif
                <li class="nav-item col-1"><a class="nav-link" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                </li>
            @endguest
            <li class="nav-item my-2 offset-1">
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle bg-primary" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('Language') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" id="langList">
                        <li><a class="dropdown-item" href="{{ url('locale/en') }}"><img
                                    src=" {{ url('/images/lang/gb.svg') }}" alt="" style="max-height: 10px ">
                                {{ __('English') }}</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ url('locale/es') }}"><img
                                    src=" {{ url('/images/lang/es.svg') }}" alt="" style="max-height: 10px ">
                                {{ __('Spanish') }}</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item my-2 button-cart">
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle bg-info" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src=" {{ url('/images/shopping-cart.png') }}" alt="shopping-cart"
                            style="max-height: 18px;">
                    </a>
                    <ul class="dropdown-menu shopping-cart" aria-labelledby="dropdownMenuLink" id="langList">
            </li>
            <li><a class="dropdown-item" href="{{ route('cart.checkout') }}">{{ __('View all cart') }}</a></li>
        </ul>
    </div>
    </li>
    </ul>
    </div>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
