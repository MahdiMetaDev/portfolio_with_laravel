<!--===== HEADER =====-->
<header class="l-header">
    <nav class="nav bd-grid">
        <div>
            <a href="#" class="nav__logo"></a>
        </div>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item"><a href="{{ route('root') }}" class="nav__link active">Home</a></li>
                <li class="nav__item"><a href="{{ route('blog.index') }}" class="nav__link">Blog</a></li>
                <li class="nav__item"><a href="{{ route('portfolio.index') }}" class="nav__link">Portfolio</a></li>
                <li class="nav__item"><a href="{{ route('admin.dashboard.index') }}" class="nav__link">Admin</a></li>
                @if(auth()->user())
                    <li class="nav__item"><a href="{{ route('profile.edit') }}" class="nav__item__orange">Hello {{ auth()->user()->name }}</a></li>
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <li class="nav__item__far"><input type="submit" value="Logout"></li>
                    </form>
                @else
                    <li class="nav__item__far">
                        <a href="{{ route('register') }}" class="nav__item__orange">Register</a>
                        <span>|</span>
                        <a href="{{ route('login') }}" class="nav__item__orange">Login</a>
                    </li>
                @endif
            </ul>
        </div>

        <div class="nav__toggle" id="nav-toggle">
            <i class='bx bx-menu'></i>
        </div>
    </nav>
</header>
