<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('libraries/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <header>
            <div class="bg-lightest">
                <div class="container d-flex justify-content-between align-items-center">
                    <ul class="nav">
                        <li class="nav-item">
                            <span class="nav-link text-midgray fs-7">June 28, 2024</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-midgray fs-7" href="#">Advertisement</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-midgray fs-7" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-midgray fs-7" href="#">Contact</a>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link text-midgray fs-6" href="#"><i
                                    class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-midgray fs-6" href="#"><i class="fa-brands fa-github"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-midgray fs-6" href="#"><i
                                    class="fa-brands fa-linkedin-in"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-midgray fs-6" href="#"><i
                                    class="fa-brands fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="bg-white">
                <div class="container">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <div class="navbar-brand logo me-5">
                                <img class="w-100" src="{{asset('images/logo.png')}}" alt="">
                            </div>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="d-flex g-5 navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item text-center">
                                        <a class="nav-link menu-hv" href="#">Trang chủ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link menu-hv" href="#">Công nghệ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link menu-hv" href="#">Phong cách sống</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link menu-hv" href="#">Sức Khỏe</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link menu-hv" href="#">Coder 24h</a>
                                    </li>
                                </ul>
                                <form class="d-flex search-custom" role="search">
                                    <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    <input type="search" placeholder="Tìm kiếm..."
                                        aria-label="Search">
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <section class="outstanding bg-lightest py-5">
            <div class="container row mx-auto py-3">
                <div class="col-12 col-xl-6 mt-4">
                    <a href="" class="d-flex overflow-hidden position-relative rounded-4 h-600 shadow-img post-hv">
                        <img class="w-100 h-100 object-fit-cover rounded-4" src="{{ asset('images/news/demo_image-1440x720.jpg') }}" alt="">
                        <div class="ct-text text-white">
                            <span class="ct-topic">Phong cách sống</span>
                            <h3 class="ct-title mt-2">Fashion portrait of young businessman handsome model man in casual cloth.</h3>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-xl-6 mt-4">
                    <div class="h-600 d-grid-2">
                        <a href="" class="d-flex overflow-hidden position-relative rounded-4 shadow-img post-hv">
                            <img class="w-100 h-100 object-fit-cover rounded-4" src="{{ asset('images/news/post-single-04-390x260.jpg') }}" alt="">
                            <div class="ct-text text-white" style="bottom: 15px">
                                <span class="ct-topic">Phong cách sống</span>
                                <h3 class="ct-title mt-2 fs-5">Fashion portrait of young businessman handsome model man in casual cloth.</h3>
                            </div>
                        </a>
                        <a href="" class="d-flex overflow-hidden position-relative rounded-4 shadow-img post-hv">
                            <img class="w-100 h-100 object-fit-cover rounded-4" src="{{ asset('images/news/post-single-04-390x260.jpg') }}" alt="">
                            <div class="ct-text text-white" style="bottom: 15px">
                                <span class="ct-topic">Phong cách sống</span>
                                <h3 class="ct-title mt-2 fs-5">Fashion portrait of young businessman handsome model man in casual cloth.</h3>
                            </div>
                        </a>
                        <a href="" class="d-flex overflow-hidden position-relative rounded-4 shadow-img post-hv">
                            <img class="w-100 h-100 object-fit-cover rounded-4" src="{{ asset('images/news/demo_image-5-390x260.jpg') }}" alt="">
                            <div class="ct-text text-white" style="bottom: 15px">
                                <span class="ct-topic">Phong cách sống</span>
                                <h3 class="ct-title mt-2 fs-5">Fashion portrait of young businessman handsome model man in casual cloth.</h3>
                            </div>
                        </a>
                        <a href="" class="d-flex overflow-hidden position-relative rounded-4 shadow-img post-hv">
                            <img class="w-100 h-100 object-fit-cover rounded-4" src="{{ asset('images/news/demo_image-5-390x260.jpg') }}" alt="">
                            <div class="ct-text text-white" style="bottom: 15px">
                                <span class="ct-topic">Phong cách sống</span>
                                <h3 class="ct-title mt-2 fs-5">Fashion portrait of young businessman handsome model man in casual cloth.</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="{{ asset('libraries/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('libraries/bootstrap/bootstrap.min.js') }}"></script>
</body>

</html>
