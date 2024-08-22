@extends('admins.layouts.master')
@section('script-bottom')
    <script src="/js/admins/datatable.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Danh sách bình luận</h3>
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
                        <a href="#">Bình luận</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Danh sách bình luận</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4 class="card-title">Danh sách bình luận</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <td>Stt</td>
                                            <th>Nôi dung</th>
                                            <th>Người bình luận</th>
                                            <th>Bài viết</th>
                                            <th>Ngày bình luận</th>
                                            <th style="width: 10%" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($comments as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $item->content }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3" style="width: 230px;">
                                                        <div class="avatar">
                                                            <img src="{{ $item->user->avatar }}" alt="..."
                                                                class="avatar-img rounded-circle">
                                                        </div>
                                                        <span>{{ $item->user->user_name }}</span>
                                                    </div>
                                                </td>
                                                <td>{{ $item->post->title }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="{{ route('show.category', ['id' => $item->id]) }}"
                                                            data-bs-toggle="tooltip" title="Sửa"
                                                            class="btn btn-link btn-primary btn-lg"
                                                            data-original-title="Edit Task">
                                                            <i class="fa fa-reply"></i>
                                                        </a>
                                                        <form class="d-flex align-items-center"
                                                            id="delete-form-{{ $item->id }}" method="POST"
                                                            action="{{ route('delete.comment', ['id' => $item->id]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button data-bs-toggle="tooltip" title="Xóa"
                                                                class="btn btn-link btn-danger delete"
                                                                data-original-title="Remove" data-id="{{ $item->id }}">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </form>
                                                        <a href="{{ route('show.category', ['id' => $item->id]) }}"
                                                            data-bs-toggle="tooltip" title="Xem chi tiết"
                                                            class="btn btn-link btn-warning btn-lg"
                                                            data-original-title="detail">
                                                            <i class="fa fa-eye"></i>
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
            </div>
        </div>
    </div>
@endsection
