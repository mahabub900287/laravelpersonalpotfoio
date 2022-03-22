@extends('fortend.master')
@section('content')
<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid ">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="index-2.html">
                                    <img width="150" height="50" src="{{asset('fontend/img/mahi.png')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="index-2.html">home</a></li>
                                        <li><a href="Works.html">Works</a></li>
                                        <li><a href="Services.html">Services</a></li>
                                        <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="works_details.html">work details</a></li>
                                                <li><a href="elements.html">elements</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="about.html">about</a></li>
                                        <li><a href="#">blog <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">blog</a></li>
                                                <li><a href="single-blog.html">single-blog</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">

                            <div class="Appointment">
                                <div class="book_btn d-none d-lg-block">
                                    <li>
                                        @if (Route::has('login'))
                                           @auth
                                           <li data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <a class="dropdown-toggle" href="">My Acound</a>
                                           </li>
                                           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                               <li><a class="dropdown-item" href="{{route('home')}}">
                                              desboard
                                               </a>
                                           </li>
                                           <li>
                                               <a class="dropdown-item" href="{{ route('logout') }}"
                                                  onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                   {{ __('Logout') }}

                                               </a>
                                               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                   @csrf
                                               </form>
                                           </li>
                                           </div>
                                           </li>
                                           @else
                                           <li><a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in/Register</a></li>
                                       @endauth
                                  @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="slider_area">
    <div class="single_slider  d-flex align-items-center slider_bg_1">
        <div class="container">
            <div class="row align-items-center position-relative">
                <div class="col-lg-9">
                    <div class="slider_text">
                        <h3 class="p-2">{{$banner->title1 }}<br>
                            <span>{{$banner->title2}}</span>
                        </h3>
                        <a class="boxed-btn3-line" href="https://github.com/mahabub900287">{{ $banner->btn_text }}</a>
                    </div>
                </div>
                <div class="my_img d-none d-lg-block">
                    <img src="{{ asset('storage/banner/'.$banner->photo) }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="download_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-10">
                <div class="download_text">
                    <h3>
                    {{$download->title}}
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="download_left">
                    <p>
                        {{$download->discription}}
                    </p>
                    <a href="https://drive.google.com/drive/folders/1ASJFoPDq9RDLj-H8XuQpq5kk0VRtiLSV" class="boxed-btn3-line">Download CV</a>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 col-md-6">
                <div class="progress_skills">
                 @foreach ($skills as  $skill )
                    <div class="single_progress">
                        <div class="label d-flex justify-content-between">
                            <span>{{$skill->title}}</span>
                            <span>{{$skill->persen}}</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar " role="progressbar" style="width:{{$skill->persen}}" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="service_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title mb-50">
                    <h3>My Services</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($services as $service)
            <div class="col-lg-4 col-md-6">
                <div class="single_service text-center">
                    <div class="icon">
                        <img src="{{ asset('storage/service/'.$service->photo)}}" alt="">
                    </div>
                    <h3>
                       {{$service->name}}
                    </h3>
                    <p>
                        {{$service->discription}}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


<div class="gallery_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title mb-50">
                    <h3>My Works</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-10">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="single_gallery">
                            <div class="thumb">
                                <img src="{{ asset('fontend/img/gallery/1.png')}}" alt="">
                            </div>
                            <div class="gallery_heading">
                                <span>Mobile App</span>
                                <a href="works_details.html">
                                    <h4>Colorlib App Project</h4>
                                </a>
                            </div>
                        </div>
                        <div class="single_gallery">
                            <div class="thumb">
                                <img src="{{ asset('fontend/img/gallery/2.png')}}" alt="">
                            </div>
                            <div class="gallery_heading">
                                <span>Mobile App</span>
                                <a href="works_details.html">
                                    <h4>Colorlib App Project</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="single_gallery">
                            <div class="thumb">
                                <img src="{{ asset('fontend/img/gallery/3.png')}}" alt="">
                            </div>
                            <div class="gallery_heading">
                                <span>Mobile App</span>
                                <a href="works_details.html">
                                    <h4>Colorlib App Project</h4>
                                </a>
                            </div>
                        </div>
                        <div class="single_gallery">
                            <div class="thumb">
                                <img src="{{ asset('fontend/img/gallery/4.png')}}" alt="">
                            </div>
                            <div class="gallery_heading">
                                <span>Mobile App</span>
                                <a href="works_details.html">
                                    <h4>Colorlib App Project</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="more_works">
                            <a class="boxed-btn3-line" href="#">More Works</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="testimonial_area ">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title">
                    <h3>What Clients say</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="testmonial_active owl-carousel">
                    <div class="single_carousel">
                        <div class="row">
                            <div class="col-xl-9 col-md-9">
                                <div class="single_testmonial">
                                    <p>“There are many variations of passages of Lorem Ipsum available, but the
                                        majority
                                        have suffered alteration in some form by injected humour or randomised words
                                        which don’t look even slightly believable. If you are going to use a
                                        passage.
                                    </p>
                                    <div class="testmonial_author">
                                        <div class="thumb">
                                            <img src="{{ asset('fontend/img/case/testmonial.png')}}" alt="">
                                        </div>
                                        <div class="author_name">
                                            <h3>Kalvin Piterson</h3>
                                            <span>Business Owner</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_carousel">
                        <div class="row">
                            <div class="col-xl-9 col-md-9">
                                <div class="single_testmonial">
                                    <p>“There are many variations of passages of Lorem Ipsum available, but the
                                        majority
                                        have suffered alteration in some form by injected humour or randomised words
                                        which don’t look even slightly believable. If you are going to use a
                                        passage.
                                    </p>
                                    <div class="testmonial_author">
                                        <div class="thumb">
                                            <img src="{{ asset('fontend/img/case/testmonial.png')}}" alt="">
                                        </div>
                                        <div class="author_name">
                                            <h3>Kalvin Piterson</h3>
                                            <span>Business Owner</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_carousel">
                        <div class="row">
                            <div class="col-xl-9 col-md-9">
                                <div class="single_testmonial">
                                    <p>“There are many variations of passages of Lorem Ipsum available, but the
                                        majority
                                        have suffered alteration in some form by injected humour or randomised words
                                        which don’t look even slightly believable. If you are going to use a
                                        passage.
                                    </p>
                                    <div class="testmonial_author">
                                        <div class="thumb">
                                            <img src="{{ asset('fontend/img/case/testmonial.png')}}" alt="">
                                        </div>
                                        <div class="author_name">
                                            <h3>Kalvin Piterson</h3>
                                            <span>Business Owner</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
