@extends('admins.layouts.master')

@section('script-bottom')
<script src="/libraries/axios/axios.min.js"></script>
<script src="/js/admins/async.js"></script>
<script src="/js/admins/datatable.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Tài khoản</h3>
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
                <a href="#">Tài khoản</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Tài khoản</a>
            </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                    <h4 class="card-title">Danh mục</h4>
                    <a href="{{route('create.subcategory')}}"
                        class="btn btn-primary btn-round ms-auto"
                        >
                        <i class="fa fa-plus"></i>
                        Tạo người dùng
                        </a>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table
                        id="multi-filter-select"
                        class="display table table-striped table-hover"
                        >
                        <thead>
                            <tr>
                                <td>Stt</td>
                                <th>Tên người dùng</th>
                                <th>Avatar</th>
                                <th>Email</th>
                                <th>Vai trò</th>
                                <th>Trạng thái</th>
                                <th style="width: 10%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                                $roleClasses = [
                                    'Super Admin' => 'badge-success',
                                    'Editor' => 'badge-warning',
                                    'Author' => 'badge-primary',
                                    'Contributor' => 'badge-info',
                                    'Subscriber' => 'badge-secondary',
                                    'Support' => 'badge-danger',
                                ];

                                $statusClasses = [
                                    'active' => ['Đã kích hoạt', 'badge-success'],
                                    'inactive' => ['Chưa kích hoạt', 'badge-warning'],
                                    'disabled' => ['Vô hiệu hóa', 'badge-danger'],
                                ];
                            @endphp
                            @foreach ($users as $item)
                                @php
                                    $bgRole = $roleClasses[$item->role->name] ?? 'badge-black';
                                    $status = $statusClasses[$item->status] ?? ['Vô hiệu hóa', 'badge-danger'];
                                    $textStatus = $status[0];
                                    $bgStatus = $status[1];
                                @endphp
                            <tr>
                              <td>{{ $i++ }}</td>
                              <td>{{ $item->user_name }}</td>
                              <td><img class="rounded-circle" width="65px" src="{{ $item->avatar }}" alt=""></td>
                              <td>{{ $item->email }}</td>
                              <td class="text-center"><span class="mx-auto badge {{ $bgRole }}">{{ $item->role->name }}</span></td>
                              <td class="text-center" id="status-{{ $item->id }}"><span class="mx-auto badge {{ $bgStatus }}">{{ $textStatus }}</span></td>
                              <td>
                                @if ($item->role->name !== 'Super Admin')
                                    <div class="d-flex justify-content-center">
                                        <button data-bs-toggle="tooltip"
                                        title="Kích hoạt"
                                        class="btn btn-link btn-primary btn-lg btn-status"
                                        data-id="{{ $item->id }}"
                                        data-status="active"
                                        data-original-title="Edit Task"><i class="fas fa-user-check"></i></button>
                                        <button data-bs-toggle="tooltip"
                                        title="Vô hiệu hóa"
                                        data-id="{{ $item->id }}"
                                        data-status="disabled"
                                        class="btn btn-link btn-danger btn-lg btn-status"
                                        data-original-title="Edit Task"><i class="fas fa-user-lock"></i></button>
                                    </div>
                                @else
                                    <p class="badge badge-info">Bạn không thể thao tác được người này!</p>
                                @endif
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