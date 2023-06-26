<nav class="navbar navbar-expand-lg" style="background-color: #d5c79df1;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="#" alt="" height="30"
                 class="d-inline-block align-text-top">
        </a>
        <a class="navbar-brand mx-3" href="#">PortFolio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">add-new-blog</a>
                </li>
            </ul>
        </div>
        @auth()
            <div class="d-flex justify-content-between">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">
                                welcome <strong>username</strong>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        @endauth
        @guest()
            <div class="d-flex justify-content-between">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">
                                first <strong style="color: rgb(200, 116, 116);">login</strong> please!
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        @endguest
    </div>
</nav>
