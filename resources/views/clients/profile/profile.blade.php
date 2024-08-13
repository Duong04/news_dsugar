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
                        <img class="w-100 h-100 rounded-circle" src="{{ Auth::user()->avatar }}" alt="">
                    </div>
                    <h5 class="fs-5 mt-3">{{ Auth::user()->user_name }}</h5>
                    <span class="badge text-bg-success">{{ Auth::user()->role->name }}</span>
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
                            <span class="fw-semibold">Nick name:</span>
                            <span class="text-midgray">{{ Auth::user()->user_name }}</span>
                        </li>
                        <li class="fs-7">
                            <span class="fw-semibold">Email:</span>
                            <span class="text-midgray">{{ Auth::user()->email }}</span>
                        </li>
                        <li class="fs-7">
                            <span class="fw-semibold">Tên:</span>
                            <span class="text-midgray">{{ Auth::user()->first_name ? Auth::user()->first_name : 'Chưa cập nhật thông tin' }}</span>
                        </li>
                        <li class="fs-7">
                            <span class="fw-semibold">Họ:</span>
                            <span class="text-midgray">{{ Auth::user()->last_name ? Auth::user()->last_name : 'Chưa cập nhật thông tin' }}</span>
                        </li>
                        <li class="fs-7">
                            <span class="fw-semibold">Địa chỉ:</span>
                            <span class="text-midgray">{{ Auth::user()->address ? Auth::user()->address : 'Chưa cập nhật thông tin'}}</span>
                        </li>
                        <li class="fs-7">
                            <span class="fw-semibold">Địa chỉ:</span>
                            <span class="text-midgray">{{ Auth::user()->phone_number ? Auth::user()->phone_number : 'Chưa cập nhật thông tin'}}</span>
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
                <a class="nav-link active" data-bs-toggle="tab" aria-current="page" href="#tab-1"><i class="fa-solid fa-dumpster-fire"></i> Tổng quan</a>
                <a class="nav-link" data-bs-toggle="tab" href="#"><i class="fa-regular fa-comments"></i> Bình luận</a>
                <a class="nav-link" data-bs-toggle="tab" href="#"><i class="fa-solid fa-chart-bar"></i> Thống kê</a>
            </nav>
            <div class="tab-content w-100">
                <div id="tab-1" class="mt-4 tab-pane fade show active">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4 class="card-title">Bài viết</h4>
                            <a href="{{ route('client.create.post') }}" class="btn btn-purple btn-round ms-auto">
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
                                            <th>Tiêu đề</th>
                                            <th>Ảnh</th>
                                            <th>Danh mục</th>
                                            <th>Danh mục con</th>
                                            <th>Lượt xem</th>
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
                                                'archived' => ['Lưu trữ', 'badge-info'],
                                            ];
                                        @endphp
                                        @foreach ($posts as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td><div style="width: 180px;" class="ct-title">{{ $item->title }}</div></td>
                                            <td><img width="50px" src="{{ $item->image }}" alt=""></td>
                                            <td><div style="width: 150px;">{{ $item->category->name }}</div></td>
                                            <td><div style="width: 150px;">{{ $item->subcategory->name }}</div></td>
                                            <td><div style="width: 150px;">{{ $item->view }}</div></td>
                                            <td><div style="width: 180px;">{{ $item->user->user_name }}</div></td>
                                            <td>ok</td>
                                        </tr>
                                        @endforeach
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
