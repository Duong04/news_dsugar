@extends('clients.layouts.master')

@section('header')
    <x-layouts-client.header />
@endsection
@section('css')
<link rel="stylesheet" href="/templates/css/plugins.min.css" />
@endsection
@section('script-bottom')
<script src="/templates/js/core/jquery-3.7.1.min.js"></script>
<script src="/js/admins/datatable.js"></script>
<script src="/templates/js/plugin/datatables/datatables.min.js"></script>
@endsection

@section('content')
<section class="py-5">
    <div class="container-md d-flex flex-column flex-lg-row mx-auto">
        <aside class="col-4 pe-5">
            <div class="py-5 bg-white aside-shadow">
                <div class="text-center">
                    <div class="img-avatar mx-auto">
                        <img class="w-100 h-100 rounded-circle" src="/images/avatar/icon/avatar-1-sTigs3cJ.png" alt="">
                    </div>
                    <h5 class="fs-5 mt-3">Nguyen Thanh Duong</h5>
                    <span class="badge text-bg-success">Author</span>
                </div>
                <div class="rp-task mx-auto d-flex flex-column g-20 mt-4">
                    <div class="d-flex g-10 align-items-center">
                        <div class="box-purple">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <span>1,230</span>
                            <span>Task Done</span>
                        </div>
                    </div>
                    <div class="d-flex g-10 align-items-center">
                        <div class="box-purple">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <span>1,230</span>
                            <span>Task Done</span>
                        </div>
                    </div>
                </div>
                <div class="px-3">
                    <h6 class="py-0">Chi tiết</h6>
                    <hr>
                    <ul class="nav d-flex flex-column g-10">
                        <li class="fs-7">
                            <span class="fw-semibold">Tên:</span>
                            <span class="text-midgray">Nguyen Thanh Duong</span>
                        </li>
                        <li class="fs-7">
                            <span class="fw-semibold">Tên:</span>
                            <span class="text-midgray">Nguyen Thanh Duong</span>
                        </li>
                        <li class="fs-7">
                            <span class="fw-semibold">Tên:</span>
                            <span class="text-midgray">Nguyen Thanh Duong</span>
                        </li>
                        <li class="fs-7">
                            <span class="fw-semibold">Tên:</span>
                            <span class="text-midgray">Nguyen Thanh Duong</span>
                        </li>
                        <li class="fs-7">
                            <span class="fw-semibold">Tên:</span>
                            <span class="text-midgray">Nguyen Thanh Duong</span>
                        </li>
                    </ul>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-purple">Chỉnh sửa</button>
                </div>
            </div>
        </aside>
        <article class="col-8">
            <nav class="nav nav-pills nav-pills-2 nav-fill g-10">
                <a class="nav-link active" data-bs-toggle="tab" aria-current="page" href="#tab-1">Tổng quan</a>
                <a class="nav-link" data-bs-toggle="tab" href="#">Bình luận</a>
                <a class="nav-link" data-bs-toggle="tab" href="#">Chưa biết ^^</a>
            </nav>
            <div class="tab-content w-100">
                <div id="tab-1" class="mt-4 tab-pane fade show active">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4 class="card-title">Bài viết</h4>
                            <a href="{{ route('create.post') }}" class="btn btn-purple btn-round ms-auto">
                                <i class="fa fa-plus"></i>
                                Thêm bài viết
                            </a>
                        </div>
                        <div class="card-body w-100">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <td>Stt</td>
                                            <th>Tên danh mục</th>
                                            <th>Lượt xem</th>
                                            <th>Ảnh</th>
                                            <th>Tác giả</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                            $statusPost = [
                                                'draft' => ['Bản nháp', 'badge-warning'],
                                                'published' => ['Đã xuất bản', 'badge-success'],
                                                'archived' => ['Lưu trử', 'badge-info'],
                                            ];
                                        @endphp
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>
</section>
@endsection

@section('footer')
    <x-layouts-client.footer />
@endsection
