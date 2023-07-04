<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.user.index') }}">
                    <span data-feather="file"></span>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.role.index') }}">
                    <span data-feather="file"></span>
                    roles
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.blog.index') }}">
                    <span data-feather="shopping-cart"></span>
                    Blogs
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="users"></span>
                    Comments
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.country.index') }}">
                    <span data-feather="bar-chart-2"></span>
                    Countries
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.city.index') }}">
                    <span data-feather="layers"></span>
                    Cities
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.profile.index') }}">
                    <span data-feather="layers"></span>
                    Profiles
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>create forms</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.user.create') }}">
                    <span data-feather="file-text"></span>
                    create user
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.blog.create') }}">
                    <span data-feather="file-text"></span>
                    create blog
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.role.create') }}">
                    <span data-feather="file-text"></span>
                    create role
                </a>
            </li>
        </ul>
    </div>
</nav>
