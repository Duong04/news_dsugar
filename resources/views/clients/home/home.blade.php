@extends('clients.layouts.master')

@section('header')
<x-layouts-client.header />
@endsection

@section('content')
<section class="outstanding bg-lightest py-5">
    <div class="container-md row mx-auto py-3">
        <div class="col-12 col-xl-6 mt-4">
            <x-posts.new-post :post="$latestPost" />
        </div>
        <div class="col-12 col-xl-6 mt-4">
            <div class="h-600 d-grid-2">
                @foreach ($latestPosts as $item)
                <x-posts.new-post-item :post="$item" />
                @endforeach
            </div>
        </div>
    </div>
    <div class="container-md mt-5">
        <h3 class="fw-bold">Chủ đề thịnh hành</h3>
        <section id="card-carousel" class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <a href="">
                            <div class="position-relative overflow-hidden rounded-4">
                                <img class="w-100 rounded-4" src="images/thumbail/bg-image-2-300x300.jpg" alt="">
                                <div class="text-white slide-text-position fw-semibold">Công nghệ</div>
                            </div>
                        </a>
                    </li>
                    <li class="splide__slide">
                        <a href="">
                            <div class="position-relative overflow-hidden rounded-4">
                                <img class="w-100 rounded-4" src="images/thumbail/demo_image-12-300x300.jpg" alt="">
                                <div class="text-white slide-text-position fw-semibold">Công nghệ</div>
                            </div>
                        </a>
                    </li>
                    <li class="splide__slide">
                        <a href="">
                            <div class="position-relative overflow-hidden rounded-4">
                                <img class="w-100 rounded-4" src="images/thumbail/demo_image-19-300x300.jpg" alt="">
                                <div class="text-white slide-text-position fw-semibold">Công nghệ</div>
                            </div>
                        </a>
                    </li>
                    <li class="splide__slide">
                        <a href="">
                            <div class="position-relative overflow-hidden rounded-4">
                                <img class="w-100 rounded-4" src="images/thumbail/demo_image-21-300x300.jpg" alt="">
                                <div class="text-white slide-text-position fw-semibold">Công nghệ</div>
                            </div>
                        </a>
                    </li>
                    <li class="splide__slide">
                        <a href="">
                            <div class="position-relative overflow-hidden rounded-4">
                                <img class="w-100 rounded-4" src="images/thumbail/demo_image-29-300x300.jpg" alt="">
                                <div class="text-white slide-text-position fw-semibold">Công nghệ</div>
                            </div>
                        </a>
                    </li>
                    <li class="splide__slide">
                        <a href="">
                            <div class="position-relative overflow-hidden rounded-4">
                                <img class="w-100 rounded-4" src="images/thumbail/post-column-01-11-300x300.jpg" alt="">
                                <div class="text-white slide-text-position fw-semibold">Công nghệ</div>
                            </div>
                        </a>
                    </li>
                    <li class="splide__slide">
                        <a href="">
                            <div class="position-relative overflow-hidden rounded-4">
                                <img class="w-100 rounded-4" src="images/thumbail/bg-image-2-300x300.jpg" alt="">
                                <div class="text-white slide-text-position fw-semibold">Công nghệ</div>
                            </div>
                        </a>
                    </li>
                    <li class="splide__slide">
                        <a href="">
                            <div class="position-relative overflow-hidden rounded-4">
                                <img class="w-100 rounded-4" src="images/thumbail/demo_image-12-300x300.jpg" alt="">
                                <div class="text-white slide-text-position fw-semibold">Công nghệ</div>
                            </div>
                        </a>
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
            @foreach ($mostViewed as $item)
            <x-posts.featured-post-item :post="$item" />
            @endforeach
        </div>
    </div>
</section>
<section class="py-5 bg-lightest">
    <div class="container-md">
        <h3>Bài viết hàng đầu</h3>
        <nav class="nav nav-pills flex-column flex-sm-row col-lg-6 g-10">
            <a class="text-midgray tab-item flex-sm-fill text-sm-center nav-link active border border-2 fw-semibold" data-bs-toggle="tab" href="#tab-1">Coder 24h</a>
            <a class="text-midgray tab-item flex-sm-fill text-sm-center nav-link border border-2 fw-semibold" data-bs-toggle="tab" href="#tab-2">Công nghệ</a>
            <a class="text-midgray tab-item flex-sm-fill text-sm-center nav-link border border-2 fw-semibold" data-bs-toggle="tab" href="#tab-3">Sức khỏe</a>
        </nav>
        <div class="tab-content">
            <div id="tab-1" class="mt-5 tab-pane fade show active">
                <div class="d-flex flex-column flex-lg-row align-items-center g-20">
                    <x-posts.top-post-col5 :posts="$post24Coders" />
                    <x-posts.top-post-col7 :post="$post24Coder" />
                </div>
            </div>
            <div id="tab-2" class="mt-5 tab-pane fade show">
                <div class="d-flex flex-column flex-lg-row align-items-center g-20">
                    <x-posts.top-post-col7 :post="$postTech" />
                    <x-posts.top-post-col5 :posts="$postTechs" />
                </div>
            </div>
            <div id="tab-3" class="mt-5 tab-pane fade show">
                <div class="d-flex flex-column flex-lg-row align-items-center g-20">
                    <x-posts.top-post-col5 :posts="$postFashions" />
                    <x-posts.top-post-col7 :post="$postFashion" />
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container-md d-flex flex-column flex-lg-row mx-auto">
        <article class="col-12 col-lg-8">
            <div class="banner w-100">
                <img class="w-100 object-fit-cover" src="images/banner/banner-01.png" alt="">
            </div>
            <div class="d-flex flex-column g-30 mt-4">
                @foreach ($postRands as $item)
                <x-posts.post-list-view :post="$item" />    
                @endforeach
            </div>
        </article>
        <x-layouts-client.aside />
    </div>
</section>
<section class="py-5 bg-lightest">
    <div class="container-md py-5">
        <ul class="social social-share d-flex justify-content-between align-items-center p-5 bg-white rounded-3 g-20">
            <li class="d-flex align-items-center g-10"><a class="text-black fb-2" href=""><i class="fa-brands fa-facebook-f"></i></a> Facebook</li>
            <li class="d-flex align-items-center g-10"><a class="text-black tw-2" href=""><i class="fa-brands fa-twitter"></i></a> Twitter</li>
            <li class="d-flex align-items-center g-10"><a class="text-black lk-2" href=""><i class="fa-brands fa-linkedin-in"></i></a> Linkedin</li>
            <li class="d-flex align-items-center g-10"><a class="text-black gh-2" href=""><i class="fa-brands fa-github"></i></a> Github</li>
            <li class="d-flex align-items-center g-10"><a class="text-black ins-2" href=""><i class="fa-brands fa-instagram"></i></a> Instagram</li>
            <li class="d-flex align-items-center g-10"><a class="text-black yt-2" href=""><i class="fa-brands fa-youtube"></i></a> Youtube</li>
        </ul>
        <div class="mt-5">
            <h2 class="fw-semibold">Instagram</h2>
            <div class="d-flex align-items-center g-20 mt-4">
                <div class="rounded-circle bg-black text-white d-flex align-items-center justify-content-center fs-2" style="height: 80px; width: 80px;"><i class="fa-brands fa-instagram"></i></div>
                <span class="fs-5 fw-semibold">axilthemes</span>
            </div>
            <div class="gallery-ins mt-4">
                <a href="" class="gallery-ins-img position-relative text-decoration-none">
                    <span class="ins-item"><i class="fa-brands fa-instagram"></i></span>
                    <img class="h-100 w-100 rounded-3 object-fit-cover" src="images/ins/141089166_114281290521790_6806988619559217725_nlow.jpg" alt="">
                </a>
                <a href="" class="gallery-ins-img position-relative text-decoration-none">
                    <span class="ins-item"><i class="fa-brands fa-instagram"></i></span>
                    <img class="h-100 w-100 rounded-3 object-fit-cover" src="images/ins/141839376_2936514369917935_4016571315941196759_nlow.jpg" alt="">
                </a>
                <a href="" class="gallery-ins-img position-relative text-decoration-none">
                    <span class="ins-item"><i class="fa-brands fa-instagram"></i></span>
                    <img class="h-100 w-100 rounded-3 object-fit-cover" src="images/ins/141894700_231719725109889_123836291213030030_nlow.jpg" alt="">
                </a>
                <a href="" class="gallery-ins-img position-relative text-decoration-none">
                    <span class="ins-item"><i class="fa-brands fa-instagram"></i></span>
                    <img class="h-100 w-100 rounded-3 object-fit-cover" src="images/ins/141988110_254903689371269_2230803479599243629_nlow.jpg" alt="">
                </a>
                <a href="" class="gallery-ins-img position-relative text-decoration-none">
                    <span class="ins-item"><i class="fa-brands fa-instagram"></i></span>
                    <img class="h-100 w-100 rounded-3 object-fit-cover" src="images/ins/142105915_842073806359300_5086671651692912917_nlow.jpg" alt="">
                </a>
                <a href="" class="gallery-ins-img position-relative text-decoration-none">
                    <span class="ins-item"><i class="fa-brands fa-instagram"></i></span>
                    <img class="h-100 w-100 rounded-3 object-fit-cover" src="images/ins/143012370_1075187099671571_2884878776177104312_nlow.jpg" alt="">
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footer')
<x-layouts-client.footer />
@endsection
