@extends('clients.layouts.master')

@section('header')
    <x-layouts-client.header />
@endsection

@section('content')
<section class="py-5">
    <div class="container-md d-flex flex-column flex-lg-row mx-auto">
        <article class="col-12 col-lg-8">
            <div>
                <span class="b-red fs-7 text-danger position-relative hover-fillip-item" data-text="{{ $post->subcategory->name }}">{{ $post->subcategory->name }}</span>
                <h1 class="fw-semibold">{{ $post->title }}</h1>
                <div class="d-flex g-10 align-items-md-center flex-column flex-md-row justify-content-between mt-4">
                    <div class="d-flex g-10 align-items-center">
                        <img class="rounded-circle object-fit-cover" width="60px" height="60px" src="{{ $post->user->avatar }}" alt="">
                        <div class="d-flex flex-column">
                            <span class="fs-7 fw-semibold author hover-fillip-item" data-text="{{ $post->user->user_name }}">{{ $post->user->user_name }}</span>
                            <span class="fs-7 text-midgray">{{ $post->created_at }}</span>
                        </div>
                    </div>
                    <div class="d-flex g-10 social-share">
                        <a class="text-black" href=""><i class="fa-brands fa-facebook-f"></i></a>
                        <a class="text-black" href=""><i class="fa-brands fa-twitter"></i></a>
                        <a class="text-black" href=""><i class="fa-brands fa-linkedin-in"></i></a>
                        <a class="text-black" href=""><i class="fa-solid fa-link"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="d-flex g-10 flex-wrap align-items-center">
                <a href="{{ route('home') }}" class="text-decoration-none text-black">Trang chủ</a>
                <i class="fa-solid fa-circle fs-7 text-midgray" style="font-size: 0.4rem;"></i>
                <span class="text-midgray">{{ $post->category->name }}</span>
                <i class="fa-solid fa-circle fs-7 text-midgray" style="font-size: 0.4rem;"></i>
                <span class="text-midgray">{{ $post->subcategory->name }}</span>
                <i class="fa-solid fa-circle fs-7 text-midgray" style="font-size: 0.4rem;"></i>
                <span class="text-midgray">{{ $post->title }}</span>
            </div>
            <div class="py-4 post-content">
                <div class="mb-3 text-midgray">
                    <i>{{ $post->description }}</i>
                </div>
                <div class="w-100">
                    <img src="{{ $post->image }}" class="w-100" alt="">
                </div>
                <div class="mt-3">
                    {!! $post->content !!}
                </div>
                
            </div>
            <hr>
            <div class="my-4">
                <div class="d-flex flex-column g-20">
                    <div class="mt-3 d-flex g-20 align-items-start">
                        <img class="rounded-circle object-fit-cover" width="60px" height="60px" src="/images/avatar/1b70c830da30f39d5c6fab323017430c.png" alt="">
                        <div class="d-flex flex-column">
                            <span class="fs-7 fw-semibold author hover-fillip-item" data-text="Nguyễn Thành Đường">Nguyễn Thành Đường</span>
                            <span class="fs-7">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur necessitatibus, numquam beatae consectetur omnis voluptas cupiditate expedita labore molestiae vitae at vero iusto molestias! Omnis expedita quos ducimus qui odit.</span>
                            <span class="fs-7 text-midgray">January 21, 2021</span>
                            <div class="d-flex g-10 align-items-center">
                                <div><span class="badge text-bg-danger">10</span> <i class="fa-regular fa-thumbs-up cursor-pointer"></i></div>
                                <div><i class="fa-regular fa-comment cursor-pointer"></i></div>
                            </div>
                            <div class="mt-3 d-flex g-20 align-items-start">
                                <img class="rounded-circle object-fit-cover" width="60px" height="60px" src="/images/avatar/1b70c830da30f39d5c6fab323017430c.png" alt="">
                                <div class="d-flex flex-column">
                                    <span class="fs-7 fw-semibold author hover-fillip-item" data-text="Nguyễn Thành Đường">Nguyễn Thành Đường</span>
                                    <span class="fs-7">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur necessitatibus, numquam beatae consectetur omnis voluptas cupiditate expedita labore molestiae vitae at vero iusto molestias! Omnis expedita quos ducimus qui odit.</span>
                                    <span class="fs-7 text-midgray">January 21, 2021</span>
                                    <div class="d-flex g-10 align-items-center">
                                        <div><span class="badge text-bg-danger">10</span> <i class="fa-regular fa-thumbs-up cursor-pointer"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between flex-column g-10 flex-md-row align-items-md-center">
                <div>
                    <h5>Nếu thấy bài viết hay hãy để lại bình luận cho tôi nha 🙆‍♀️</h5>
                    <span>(Bạn cần đăng nhập mới có thể bình luận được 😒)</span>
                </div>
                <div class="btn-comment">Bình luận</div>
            </div>
        </article>
        <x-layouts-client.aside />
    </div>
</section>
@endsection

@section('footer')
    <x-layouts-client.footer />
@endsection
