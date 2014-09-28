<nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
        <li class="name">
            <h1><a href="{{ route('home') }}"><span class="logo"></span></a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>

    <section class="top-bar-section">
        @if ( Auth::check() )
        <ul class="left">
            <li class="has-dropdown">
                <a href="{{ route('dashboard.sensors.index') }}">Sensores</a>
                <ul class="dropdown">
                    <li><a href="{{ route('dashboard.sensors.add') }}"><i class="fa fa-plus"></i> Nuevo</a></li>
                </ul>
            </li>
        </ul>
        @endif

        <ul class="right">
            @if ( Auth::check() )
            <li class="has-dropdown">
                <a href="{{ route('profile.index') }}">Cuenta</a>
                <ul class="dropdown">
                    <li><a href="{{ route('auth.logout') }}">Salir</a></li>
                </ul>
            </li>
            @else
            <li><a href="{{ route('auth.register') }}">Registro</a></li>
            <li><a href="{{ route('auth.login') }}">Entrar</a></li>
            @endif
        </ul>
    </section>
</nav>