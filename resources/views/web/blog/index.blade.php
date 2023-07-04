@extends('web.layout.master')

@section('content')
    <section class="home" id="home">
        <div class="home__container bd-grid">
            <h1 class="home__title"><span>Blog List</span></h1>
        </div>
    </section>

    @guest()
        <section class="blog">
            <div class="blog__container bd-grid">
                <h1 class="blog__title"><span>You must log in to view this page</span></h1>
            </div>
        </section>
    @endguest

    @auth()
{{--        @foreach($blogs as $blog)--}}
{{--            <div class="section-title">--}}
{{--                <h3>{{ $blog->title }}</h3>--}}
{{--            </div>--}}
{{--        @endforeach--}}
        <div class="container-xxl py-6 pt-5" id="project">
            <div class="container">
                <div class="row g-4 portfolio-container wow fadeInUp" data-wow-delay="0.1s">
                    <div class="col-lg-4 col-md-6 portfolio-item first">
                        <div class="portfolio-img rounded overflow-hidden ">
                            <img class="img-fluid" src="{{ asset('assets/img/project-1.jpg') }}" alt="">
                            <div class="portfolio-btn">
                                <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1"
                                   href="{{ asset('assets/img/project-1.jpg') }}" data-lightbox="portfolio"><i
                                        class="fa fa-eye"></i></a>
                                <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1" href=""><i
                                        class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item second">
                        <div class="portfolio-img rounded overflow-hidden">
                            <img class="img-fluid" src="{{ asset('assets/img/project-2.jpg') }}" alt="">
                            <div class="portfolio-btn">
                                <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1"
                                   href="{{ asset('assets/img/project-2.jpg') }}" data-lightbox="portfolio"><i
                                        class="fa fa-eye"></i></a>
                                <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1" href=""><i
                                        class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item first">
                        <div class="portfolio-img rounded overflow-hidden">
                            <img class="img-fluid" src="{{ asset('assets/img/project-3.jpg') }}" alt="">
                            <div class="portfolio-btn">
                                <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1"
                                   href="{{ asset('assets/img/project-3.jpg') }}" data-lightbox="portfolio"><i
                                        class="fa fa-eye"></i></a>
                                <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1" href=""><i
                                        class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item second">
                        <div class="portfolio-img rounded overflow-hidden">
                            <img class="img-fluid" src="{{ asset('assets/img/project-4.jpg') }}" alt="">
                            <div class="portfolio-btn">
                                <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1"
                                   href="{{ asset('assets/img/project-4.jpg') }}" data-lightbox="portfolio"><i
                                        class="fa fa-eye"></i></a>
                                <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1" href=""><i
                                        class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item first">
                        <div class="portfolio-img rounded overflow-hidden">
                            <img class="img-fluid" src="{{ asset('assets/img/project-5.jpg') }}" alt="">
                            <div class="portfolio-btn">
                                <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1"
                                   href="{{ asset('assets/img/project-5.jpg') }}" data-lightbox="portfolio"><i
                                        class="fa fa-eye"></i></a>
                                <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1" href=""><i
                                        class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item second">
                        <div class="portfolio-img rounded overflow-hidden">
                            <img class="img-fluid" src="{{ asset('assets/img/project-6.jpg') }}" alt="">
                            <div class="portfolio-btn">
                                <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1"
                                   href="{{ asset('assets/img/project-6.jpg') }}" data-lightbox="portfolio"><i
                                        class="fa fa-eye"></i></a>
                                <a class="btn btn-lg-square btn-outline-secondary border-2 mx-1" href=""><i
                                        class="fa fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection()
