@extends('clients.layouts.master')

@section('header')
    <x-layouts-client.header />
@endsection
@section('css')
    <link rel="stylesheet" href="/templates/css/plugins.min.css" />
    <link rel="stylesheet" href="/css/custom.css" />
@endsection
@section('script-bottom')
    <script src="/templates/js/core/jquery-3.7.1.min.js"></script>
    <script src="/js/admins/datatable.js"></script>
    <script src="/templates/js/plugin/datatables/datatables.min.js"></script>
    <script src="/templates/js/kaiadmin.min.js"></script>
    <script type="module" src="/js/stats.js"></script>
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
                                <span
                                    class="text-midgray">{{ Auth::user()->first_name ? Auth::user()->first_name : 'Chưa cập nhật thông tin' }}</span>
                            </li>
                            <li class="fs-7">
                                <span class="fw-semibold">Họ:</span>
                                <span
                                    class="text-midgray">{{ Auth::user()->last_name ? Auth::user()->last_name : 'Chưa cập nhật thông tin' }}</span>
                            </li>
                            <li class="fs-7">
                                <span class="fw-semibold">Địa chỉ:</span>
                                <span
                                    class="text-midgray">{{ Auth::user()->address ? Auth::user()->address : 'Chưa cập nhật thông tin' }}</span>
                            </li>
                            <li class="fs-7">
                                <span class="fw-semibold">Địa chỉ:</span>
                                <span
                                    class="text-midgray">{{ Auth::user()->phone_number ? Auth::user()->phone_number : 'Chưa cập nhật thông tin' }}</span>
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
                    <a class="nav-link active" data-bs-toggle="tab" aria-current="page" href="#tab-1"><i
                            class="fa-solid fa-dumpster-fire"></i> Tổng quan</a>
                    <a class="nav-link" data-bs-toggle="tab" href="#tab-2"><i class="fa-regular fa-comments"></i> Bình
                        luận</a>
                    <a class="nav-link" data-bs-toggle="tab" href="#tab-3"><i class="fa-solid fa-chart-bar"></i> Thống
                        kê</a>
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
                                                <th>Trạng thái</th>
                                                <th>Danh mục</th>
                                                <th>Danh mục con</th>
                                                <th>Lượt xem</th>
                                                <th>Tác giả</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                                $statusPost = [
                                                    'draft' => ['Bản nháp', 'badge-warning'],
                                                    'published' => ['Đã xuất bản', 'badge-success'],
                                                    'archived' => ['Lưu trữ', 'badge-info'],
                                                    'pending' => ['Chờ kiểm duyệt', 'badge-secondary'],
                                                    'rejected' => ['Đã từ chối', 'badge-danger'],
                                                ];
                                            @endphp
                                            @foreach ($posts as $item)
                                                @php
                                                    $textStatus = $statusPost[$item->status][0];
                                                    $bgStatus = $statusPost[$item->status][1];
                                                @endphp
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>
                                                        <div style="width: 180px;" class="ct-title">{{ $item->title }}
                                                        </div>
                                                    </td>
                                                    <td><img width="50px" src="{{ $item->image }}" alt=""></td>
                                                    <td>
                                                        <div style="width: 100px;" class="text-center"><span
                                                                class="badge {{ $bgStatus }}">{{ $textStatus }}</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div style="width: 150px;">{{ $item->category->name }}</div>
                                                    </td>
                                                    <td>
                                                        <div style="width: 150px;">{{ $item->subcategory->name }}</div>
                                                    </td>
                                                    <td>
                                                        <div style="width: 150px;">{{ $item->view }}</div>
                                                    </td>
                                                    <td>
                                                        <div style="width: 180px;">{{ $item->user->user_name }}</div>
                                                    </td>
                                                    <td>
                                                        <div style="width: 120px;"
                                                            class="d-flex g-10 justify-content-center align-items-center">
                                                            <a href="{{ route('client.show.post', ['slug' => $item->slug]) }}"
                                                                class="text-warning" data-bs-toggle="tooltip"
                                                                title="Sửa">
                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                            </a>
                                                            <a href="" class="text-danger" data-bs-toggle="tooltip"
                                                                title="Xóa">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-2" class="mt-4 tab-pane fade show">
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
                                    <table id="multi-filter-select-2" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <td>Stt</td>
                                                <th>Nội dung</th>
                                                <th>Người bình luận</th>
                                                <th>Bài viết</th>
                                                <th>Ngày bình luận</th>
                                                <th>Action</th>
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
                                            @foreach ($comments as $item)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>
                                                        <div style="width: 180px;">{{ $item->content }}</div>
                                                    </td>
                                                    <td>
                                                        <div style="width: 180px;">{{ $item->user->user_name }}</div>
                                                    </td>
                                                    <td>
                                                        <div style="width: 150px;" class="ct-title">
                                                            {{ $item->post->title }}</div>
                                                    </td>
                                                    <td>
                                                        <div style="width: 150px;">{{ $item->created_at }}</div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center g-10">
                                                            <a href="" class="text-info" data-bs-toggle="tooltip"
                                                                title="Trả lời">
                                                                <i class="fa-solid fa-reply"></i>
                                                            </a>
                                                            <a href="" class="text-danger"
                                                                data-bs-toggle="tooltip" title="Xóa">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </a>
                                                            <a href="" class="text-warning"
                                                                data-bs-toggle="tooltip" title="Xem chi tiết">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-3" class="mt-4 tab-pane fade show">
                        <div class="row">
                            <div class="col-sm-6 col-md-4 mt-4">
                                <div class="card card-stats card-round">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-icon">
                                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                                    <i class="far fa-check-circle"></i>
                                                </div>
                                            </div>
                                            <div class="col col-stats ms-3 ms-sm-0">
                                                <div class="numbers">
                                                    <p class="card-category">Đã duyệt</p>
                                                    <h4 class="card-title">{{ $published }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 mt-4">
                                <div class="card card-stats card-round">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-icon">
                                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                                    <i class="fa-solid fa-wallet"></i>
                                                </div>
                                            </div>
                                            <div class="col col-stats ms-3 ms-sm-0">
                                                <div class="numbers">
                                                    <p class="card-category">Lưu trữ</p>
                                                    <h4 class="card-title">{{ $archived }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 mt-4">
                                <div class="card card-stats card-round">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-icon">
                                                <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                                    <i class="fas fa-luggage-cart"></i>
                                                </div>
                                            </div>
                                            <div class="col col-stats ms-3 ms-sm-0">
                                                <div class="numbers">
                                                    <p class="card-category">Chờ kiểm duyệt</p>
                                                    <h4 class="card-title">{{ $pending }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 mt-4">
                                <div class="card card-stats card-round">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-icon">
                                                <div class="icon-big text-center icon-warning bubble-shadow-small">
                                                    <i class="fa-solid fa-clipboard"></i>
                                                </div>
                                            </div>
                                            <div class="col col-stats ms-3 ms-sm-0">
                                                <div class="numbers">
                                                    <p class="card-category">Bản nháp</p>
                                                    <h4 class="card-title">{{ $draft }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 mt-4">
                                <div class="card card-stats card-round">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-icon">
                                                <div class="icon-big text-center icon-danger bubble-shadow-small">
                                                    <i class="fa-regular fa-circle-xmark"></i>
                                                </div>
                                            </div>
                                            <div class="col col-stats ms-3 ms-sm-0">
                                                <div class="numbers">
                                                    <p class="card-category">Đã từ chối</p>
                                                    <h4 class="card-title">{{ $rejected }}</h4>
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
        </article>
        </div>
    </section>
@endsection

@section('footer')
    <x-layouts-client.footer />
@endsection
