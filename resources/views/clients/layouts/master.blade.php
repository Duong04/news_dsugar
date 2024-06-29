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
    <link href="libraries/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="libraries/splide/splide.min.css">
</head>
</head>

<body>
    <div id="app">
        <header>
            <div class="bg-lightest">
                <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-center">
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
                            <a class="nav-link text-midgray fs-6 fb" href="#"><i
                                    class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-midgray fs-6 gh" href="#"><i class="fa-brands fa-github"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-midgray fs-6 lk" href="#"><i
                                    class="fa-brands fa-linkedin-in"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-midgray fs-6 ins" href="#"><i
                                    class="fa-brands fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="bg-white">
                <div class="container-md">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <div class="navbar-brand logo me-2 me-xl-5">
                                <img class="w-100" src="{{asset('images/logo.png')}}" alt="">
                            </div>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="d-flex g-5 navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link menu-hv fs-6" href="#">Trang chủ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link menu-hv fs-6" href="#">Công nghệ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link menu-hv fs-6" href="#">Phong cách sống</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link menu-hv fs-6" href="#">Sức Khỏe</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link menu-hv fs-6" href="#">Coder 24h</a>
                                    </li>
                                </ul>
                                <div class="d-flex g-10">
                                    <form class="d-flex search-custom" role="search">
                                        <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        <input type="search" placeholder="Tìm kiếm..."
                                            aria-label="Search">
                                    </form>
                                    <a href="" class="account"><i class="fa-solid fa-user fs-7"></i></a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <section class="outstanding bg-lightest py-5">
            <div class="container-md row mx-auto py-3">
                <div class="col-12 col-xl-6 mt-4">
                    <a href="" class="h-sm-300 d-flex overflow-hidden position-relative rounded-4 h-600 shadow-img post-hv">
                        <img class="w-100 h-100 object-fit-cover rounded-4" src="images/news/demo_image-1440x720.jpg" alt="">
                        <div class="ct-text text-white">
                            <span class="ct-topic fs-7">Phong cách sống</span>
                            <h3 class="ct-title mt-2 fw-semibold">Fashion portrait of young businessman handsome model man in casual cloth.</h3>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-xl-6 mt-4">
                    <div class="h-600 d-grid-2">
                        <a href="" class="h-sm-300 d-flex overflow-hidden position-relative rounded-4 shadow-img post-hv">
                            <img class="w-100 h-100 object-fit-cover rounded-4" src="images/news/post-single-04-390x260.jpg" alt="">
                            <div class="ct-text text-white" style="bottom: 15px">
                                <span class="ct-topic fs-7">Phong cách sống</span>
                                <h3 class="ct-title mt-2 fw-semibold fs-5">Fashion portrait of young businessman handsome model man in casual cloth.</h3>
                            </div>
                        </a>
                        <a href="" class="h-sm-300 d-flex overflow-hidden position-relative rounded-4 shadow-img post-hv">
                            <img class="w-100 h-100 object-fit-cover rounded-4" src="images/news/post-single-04-390x260.jpg" alt="">
                            <div class="ct-text text-white" style="bottom: 15px">
                                <span class="ct-topic fs-7">Phong cách sống</span>
                                <h3 class="ct-title mt-2 fw-semibold fs-5">Fashion portrait of young businessman handsome model man in casual cloth.</h3>
                            </div>
                        </a>
                        <a href="" class="h-sm-300 d-flex overflow-hidden position-relative rounded-4 shadow-img post-hv">
                            <img class="w-100 h-100 object-fit-cover rounded-4" src="images/news/demo_image-5-390x260.jpg" alt="">
                            <div class="ct-text text-white" style="bottom: 15px">
                                <span class="ct-topic fs-7">Phong cách sống</span>
                                <h3 class="ct-title mt-2 fw-semibold fs-5">Fashion portrait of young businessman handsome model man in casual cloth.</h3>
                            </div>
                        </a>
                        <a href="" class="h-sm-300 d-flex overflow-hidden position-relative rounded-4 shadow-img post-hv">
                            <img class="w-100 h-100 object-fit-cover rounded-4" src="images/news/demo_image-5-390x260.jpg" alt="">
                            <div class="ct-text text-white" style="bottom: 15px">
                                <span class="ct-topic fs-7">Phong cách sống</span>
                                <h3 class="ct-title mt-2 fw-semibold fs-5">Fashion portrait of young businessman handsome model man in casual cloth.</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="container-md mt-5">
                <h3 class="fw-bold">Chủ đề thịnh hành</h3>
                <section id="card-carousel" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <div class="position-relative overflow-hidden rounded-4">
                                    <img class="w-100 rounded-4" src="images/thumbail/bg-image-2-300x300.jpg" alt="">
                                    <div class="text-white slide-text-position fw-semibold">Công nghệ</div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="position-relative overflow-hidden rounded-4">
                                    <img class="w-100 rounded-4" src="images/thumbail/demo_image-12-300x300.jpg" alt="">
                                    <div class="text-white slide-text-position fw-semibold">Công nghệ</div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="position-relative overflow-hidden rounded-4">
                                    <img class="w-100 rounded-4" src="images/thumbail/demo_image-19-300x300.jpg" alt="">
                                    <div class="text-white slide-text-position fw-semibold">Công nghệ</div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="position-relative overflow-hidden rounded-4">
                                    <img class="w-100 rounded-4" src="images/thumbail/demo_image-21-300x300.jpg" alt="">
                                    <div class="text-white slide-text-position fw-semibold">Công nghệ</div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="position-relative overflow-hidden rounded-4">
                                    <img class="w-100 rounded-4" src="images/thumbail/demo_image-29-300x300.jpg" alt="">
                                    <div class="text-white slide-text-position fw-semibold">Công nghệ</div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="position-relative overflow-hidden rounded-4">
                                    <img class="w-100 rounded-4" src="images/thumbail/post-column-01-11-300x300.jpg" alt="">
                                    <div class="text-white slide-text-position fw-semibold">Công nghệ</div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="position-relative overflow-hidden rounded-4">
                                    <img class="w-100 rounded-4" src="images/thumbail/bg-image-2-300x300.jpg" alt="">
                                    <div class="text-white slide-text-position fw-semibold">Công nghệ</div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="position-relative overflow-hidden rounded-4">
                                    <img class="w-100 rounded-4" src="images/thumbail/demo_image-12-300x300.jpg" alt="">
                                    <div class="text-white slide-text-position fw-semibold">Công nghệ</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
        </section>
        <section class="py-5">
            <div class="container-md">
                <h3 class="fw-bold">Bài viết nổi bật</h3>
                <div class="d-grid-lg-2 d-grid-2 g-10">
                    <div class="featured-post-item border border-2 rounded-4 d-flex flex-column flex-md-row align-items-center p-3 py-5">
                        <div>
                            <div class="d-flex flex-column justify-content-between">
                                <span class="fs-7 text-danger">Công nghệ</span>
                                <a href="" class="text-link text-black text-decoration-none fw-semibold fs-5">Fashion portrait of young businessman handsome model man in casual cloth.</a>
                                <div class="d-flex g-10 align-items-center mt-4">
                                    <img class="rounded-circle object-fit-cover" width="60px" height="60px" src="images/avatar/1b70c830da30f39d5c6fab323017430c.png" alt="">
                                    <div class="d-flex flex-column">
                                        <span class="fs-7 fw-semibold">Nguyễn Thành Đường</span>
                                        <span class="fs-7 text-midgray">January 21, 2021</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="box-cricle-img overflow-hidden rounded-circle">
                                <img class="w-100 object-fit-cover" src="images/news/demo_image-1440x720.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="featured-post-item border border-2 rounded-4 d-flex flex-column flex-md-row align-items-center p-3 py-5">
                        <div>
                            <div class="d-flex flex-column justify-content-between">
                                <span class="fs-7 text-danger">Công nghệ</span>
                                <a href="" class="text-link text-black text-decoration-none fw-semibold fs-5">Fashion portrait of young businessman handsome model man in casual cloth.</a>
                                <div class="d-flex g-10 align-items-center mt-4">
                                    <img class="rounded-circle object-fit-cover" width="60px" height="60px" src="images/avatar/1b70c830da30f39d5c6fab323017430c.png" alt="">
                                    <div class="d-flex flex-column">
                                        <span class="fs-7 fw-semibold">Nguyễn Thành Đường</span>
                                        <span class="fs-7 text-midgray">January 21, 2021</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="box-cricle-img overflow-hidden rounded-circle">
                                <img class="w-100 object-fit-cover" src="images/news/demo_image-1440x720.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="featured-post-item border border-2 rounded-4 d-flex flex-column flex-md-row align-items-center p-3 py-5">
                        <div>
                            <div class="d-flex flex-column justify-content-between">
                                <span class="fs-7 text-danger">Công nghệ</span>
                                <a href="" class="text-link text-black text-decoration-none fw-semibold fs-5">Fashion portrait of young businessman handsome model man in casual cloth.</a>
                                <div class="d-flex g-10 align-items-center mt-4">
                                    <img class="rounded-circle object-fit-cover" width="60px" height="60px" src="images/avatar/1b70c830da30f39d5c6fab323017430c.png" alt="">
                                    <div class="d-flex flex-column">
                                        <span class="fs-7 fw-semibold">Nguyễn Thành Đường</span>
                                        <span class="fs-7 text-midgray">January 21, 2021</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="box-cricle-img overflow-hidden rounded-circle">
                                <img class="w-100 object-fit-cover" src="images/news/demo_image-1440x720.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="featured-post-item border border-2 rounded-4 d-flex flex-column flex-md-row align-items-center p-3 py-5">
                        <div>
                            <div class="d-flex flex-column justify-content-between">
                                <span class="fs-7 text-danger">Công nghệ</span>
                                <a href="" class="text-link text-black text-decoration-none fw-semibold fs-5">Fashion portrait of young businessman handsome model man in casual cloth.</a>
                                <div class="d-flex g-10 align-items-center mt-4">
                                    <img class="rounded-circle object-fit-cover" width="60px" height="60px" src="images/avatar/1b70c830da30f39d5c6fab323017430c.png" alt="">
                                    <div class="d-flex flex-column">
                                        <span class="fs-7 fw-semibold">Nguyễn Thành Đường</span>
                                        <span class="fs-7 text-midgray">January 21, 2021</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="box-cricle-img overflow-hidden rounded-circle">
                                <img class="w-100 object-fit-cover" src="images/news/demo_image-1440x720.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="libraries/splide/splide.min.js"></script>
    <script src="js/slider.js"></script>
    <script src="libraries/bootstrap/popper.min.js"></script>
    <script src="libraries/bootstrap/bootstrap.min.js"></script>
</body>

</html>
