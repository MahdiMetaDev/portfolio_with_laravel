<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('root') }}">My Site</a>
    <ul class="navbar-nav px-3">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            @auth()
                <button class="btn btn-primary ml-2" type="button" disabled>Hello {{ auth()->user()->name }}</button>
                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger ml-2">Sign Out</button>
                </form>
            @endauth
            @guest()
                <a href="{{ route('login') }}" role="button" class="btn btn-success">Login</a>
            @endguest
        </div>
    </ul>
</nav>
