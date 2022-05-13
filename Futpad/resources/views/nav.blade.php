<nav class="navbar-expand-md navbar-light bg-white shadow-sm d-none d-sm-none d-md-block">
    <div class="m-0">
        <ul class="nav">
            <a href={{ route('home') }}>
                <img class="col-12" src={{ url('/images/Futpadlogo.png') }} alt="{{ __('Logo de Futpad') }}"
                    height="80px">
            </a>
            <li class="nav-item offset-md-0 offset-lg-1 offset-xl-2 col-lg-1 text-center d-inline-block">
                <a class="nav-link customLink {{ setActive('shop') }}" href={{ route('shop') }}>
                    {{ __('Shop') }}
                </a>
            </li>
            <li class=" nav-item col-lg-1 text-center">
                <a class=" nav-link customLink {{ setActive('booking') }}" href={{ route('booking') }}>
                    {{ __('Booking') }}
                </a>
            </li>
            @guest
                <li class="nav-item col-lg-1  text-center "><a class="nav-link customLink {{ setActive('register') }}"
                        href={{ route('register') }}>{{ __('Register') }}</a>
                </li>
                <li class="nav-item col-lg-1 col-md-1 offset-md-0 offset-lg-0 text-center d-inline-block text-nowrap ">
                    <a class="nav-link customLink {{ setActive('login') }}" href={{ route('login') }}>
                        {{ __('Login') }}
                    </a>
                </li>
            @else
                @if (auth()->user()->type == 'admin')
                    <li class="nav-item  text-center"><a class="nav-link"
                            href={{ route('dashboard') }}>{{ __('Manage') }}</a>
                    </li>
                @else
                    <li class="nav-item col-1 text-center"><a class="nav-link"
                            href={{ route('dashboard') }}>{{ __('My account') }}</a>
                    </li>
                @endif
                <li class="nav-item col-1 text-center text-nowrap"><a class="nav-link" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            @endguest
            <li class="nav-item my-2 offset-md-1 offset-lg-1 offset-xl-2">
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
            @guest
                <li class="nav-item my-2 button-cart">
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle bg-info" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src=" {{ url('/images/shopping-cart.png') }}" alt="shopping-cart"
                                style="max-height: 18px;">
                            <span> ({{ Cart::getContent()->count() }})</span>
                        </a>
                        <ul class="dropdown-menu shopping-cart" aria-labelledby="dropdownMenuLink" id="langList">
                            @if (Cart::getContent())
                                <li><a class="dropdown-item"
                                        href="{{ route('cart.checkout') }}">{{ __('View all cart') }}<span>
                                            ({{ Cart::getContent()->count() }})</span></a></li>
                            @endif
                        </ul>
                    </div>
                </li>
            @else
                @if (auth()->user()->type != 'admin')
                    <li class="nav-item my-2 button-cart">
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle bg-info" href="#" role="button"
                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src=" {{ url('/images/shopping-cart.png') }}" alt="shopping-cart"
                                    style="max-height: 18px;">
                                <span> ({{ Cart::getContent()->count() }})</span>
                            </a>
                            <ul class="dropdown-menu shopping-cart" aria-labelledby="dropdownMenuLink" id="langList">
                                @if (Cart::getContent())
                                    <li><a class="dropdown-item"
                                            href="{{ route('cart.checkout') }}">{{ __('View all cart') }}<span>
                                                ({{ Cart::getContent()->count() }})</span></a></li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif
            @endguest

    </div>
</nav>



<nav class="navbar navbar-dark bg-light d-block d-sm-block d-md-none">
    <div class="d-flex">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="">
                <img src={{ url('/images/Futpadlogo.png') }} alt="{{ __('Logo de Futpad') }}" height="80px">
            </span>
        </button>
        <div class="d-flex align-items-end m-auto">
            <div class="dropdown mx-2">
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
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle bg-info" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src=" {{ url('/images/shopping-cart.png') }}" alt="shopping-cart" style="max-height: 18px;">
                    <span> ({{ Cart::getContent()->count() }})</span>
                </a>
                <ul class="dropdown-menu shopping-cart" aria-labelledby="dropdownMenuLink" id="langList">
                    @if (Cart::getContent())
                        <li><a class="dropdown-item"
                                href="{{ route('cart.checkout') }}">{{ __('View all cart') }}<span>
                                    ({{ Cart::getContent()->count() }})</span></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-light p-4 border-dark text-center d-block d-sm-block d-md-none">
        <a class="nav-link border-bottom {{ setActive('home') }}" href={{ route('home') }}>
            {{ __('Home') }}
        </a>
        <a class="nav-link border-bottom {{ setActive('shop') }}" href={{ route('shop') }}>
            {{ __('Shop') }}
        </a>
        <a class=" nav-link border-bottom {{ setActive('booking') }}" href={{ route('booking') }}>
            {{ __('Booking') }}
        </a>
        @guest
            <a class="nav-link border-bottom {{ setActive('register') }}"
                href={{ route('register') }}>{{ __('Register') }}</a>
            <a class="nav-link {{ setActive('login') }}" href={{ route('login') }}>
                {{ __('Login') }}
            </a>
        @else
            @if (auth()->user()->type == 'admin')
                <a class="nav-link border-bottom" href={{ route('dashboard') }}>{{ __('Manage') }}</a>
            @else
                <a class="nav-link border-bottom" href={{ route('dashboard') }}>{{ __('My account') }}</a>
            @endif
            <a class="nav-link" href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endguest
    </div>
</div>
