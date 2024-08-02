@extends('admins.layouts.master')
@section('script-bottom')
<script src="/js/admins/datatable.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Bài viết</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Bài viết</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Bài viết</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4 class="card-title">Bài viết</h4>
                            <a href="{{ route('create.post') }}" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i>
                                Thêm bài viết
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <td>Stt</td>
                                            <th>Tên danh mục</th>
                                            <th>Lượt xem</th>
                                            <th>Ảnh</th>
                                            <th>Tác giả</th>
                                            <th>Danh mục</th>
                                            <th>Danh mục con</th>
                                            <th>Trạng thái</th>
                                            <th>Mô tả ngắn</th>
                                            <th>Ngày tạo</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($posts as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td><div style="width: 180px;">{{ $item->title }}</div></td>
                                                <td>{{ $item->view }}</td>
                                                <td><img width="80px" src="{{ $item->image }}" alt=""></td>
                                                <td><div style="width: 150px;">{{ $item->user->user_name }}</div></td>
                                                <td><div style="width: 150px;">{{ $item->category->name }}</div></td>
                                                <td><div style="width: 150px;">{{ $item->subcategory->name }}</div></td>
                                                <td><div style="width: 100px;">{{ $item->status }}</div></td>
                                                <td><p class="description" style="width: 200px;">{{ $item->description }}</p></div></td>
                                                <td><div style="width: 150px;">{{ $item->created_at }}</div></td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="{{ route('show.post', ['id' => $item->id]) }}"
                                                            data-bs-toggle="tooltip" title="Sửa"
                                                            class="btn btn-link btn-primary btn-lg"
                                                            data-original-title="Edit Task">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form class="d-flex align-items-center"
                                                            id="delete-form-{{ $item->id }}" method="POST"
                                                            action="{{ route('delete.post', ['id' => $item->id]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button data-bs-toggle="tooltip" title="Xóa"
                                                                class="btn btn-link btn-danger delete"
                                                                data-original-title="Remove" data-id="{{ $item->id }}">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </form>
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
            </div>
        </div>
    </div>
@endsection
