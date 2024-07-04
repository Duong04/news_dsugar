@extends('clients.layouts.master')

@section('header')
    <x-layouts-client.header />
@endsection

@section('content')
    <section class="bg-lightest py-5">
        <div class="container-md">
            <div class="d-flex g-10 align-items-center">
                <a href="" class="text-decoration-none text-black">Trang chủ</a>
                <i class="fa-solid fa-circle fs-7 text-midgray" style="font-size: 0.4rem;"></i>
                <span class="text-midgray">Công nghệ</span>
            </div>
            <h2 class="mt-3 d-flex align-items-center g-10 fw-sm-semibold"><span>Danh mục</span> <i
                    class="fa-solid fa-angle-right"></i> <span>Công nghệ</span></h2>
        </div>
    </section>
    <section class="container-md py-4">
        <h5>Danh mục con</h5>
        <div class="d-grid-10 subcat">
            <div><a class="btn btn-outline-primary" href="">Công nghệ</a></div>
            <div><a class="btn btn-outline-primary" href="">Công nghệ</a></div>
            <div><a class="btn btn-outline-primary" href="">Công nghệ</a></div>
            <div><a class="btn btn-outline-primary" href="">Công nghệ</a></div>
            <div><a class="btn btn-outline-primary" href="">Công nghệ</a></div>
            <div><a class="btn btn-outline-primary" href="">Công nghệ</a></div>
            <div><a class="btn btn-outline-primary" href="">Công nghệ</a></div>
        </div>
    </section>
    <section class="outstanding bg-lightest py-5">
        <div class="container-md row mx-auto py-3">
            <div class="col-12 col-xl-6 mt-4">
                <x-posts.new-post />
            </div>
            <div class="col-12 col-xl-6 mt-4">
                <div class="h-600 d-grid-2">
                    <x-posts.new-post-item2 />
                    <x-posts.new-post-item2 />
                    <x-posts.new-post-item2 />
                    <x-posts.new-post-item2 />
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container-md d-flex flex-column flex-lg-row mx-auto">
            <article class="col-12 col-lg-8">
                <div class="d-flex flex-column g-30 mt-4">
                    <x-posts.post-list-view />
                    <x-posts.post-list-view />
                    <x-posts.post-list-view />
                    <x-posts.post-list-view />
                    <x-posts.post-list-view />
                </div>
                <nav aria-label="Page navigation">
                    <ul class="pagination d-flex justify-content-center mt-3">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </article>
            <x-layouts-client.aside />
        </div>
    </section>
@endsection

@section('footer')
    <x-layouts-client.footer />
@endsection
