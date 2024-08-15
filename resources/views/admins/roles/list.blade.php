@extends('admins.layouts.master')
@section('script-bottom')
<script src="/js/admins/datatable.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Quản lý vai trò</h3>
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
                <a href="#">Phân quyền</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Quản lý vai trò</a>
            </li>
            </ul>
        </div>
        <div class="row px-3 my-5">
            @foreach ($roles as $item)
            <div class="col-4 p-2">
                <div class="p-4 bg-white rounded-3 shadow d-flex justify-content-between">
                    <div class="d-flex flex-column justify-content-between">
                        <h6>Total {{ $item->users_count }} users</h6>
                        <div class="pt-3">
                            <h5>{{ $item->name }}</h5>
                            <div class="d-flex">
                                <a href="{{ route('show.role', ['id' => $item->id]) }}"
                                    data-bs-toggle="tooltip"
                                    title="Sửa"
                                    class="btn btn-link btn-primary btn-lg p-0"
                                    data-original-title="Edit Task"
                                  >
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form id="delete-form-{{ $item->id }}" method="POST" action="{{ route('delete.role', ['id' => $item->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                      data-bs-toggle="tooltip"
                                      title="Xóa"
                                      class="btn btn-link btn-danger delete p-0 ms-3"
                                      data-original-title="Remove"
                                      data-id="{{ $item->id }}"
                                    >
                                      <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="img-users d-flex position-relative">
                            <div class="img-user">
                                <img class="h-100 w-100 rounded-circle" src="/images/avatar/icon/avatar-1-sTigs3cJ.png" alt="">
                            </div>
                            <div class="img-user">
                                <img class="h-100 w-100 rounded-circle" src="/images/avatar/icon/avatar-2-wiQeFG56.png" alt="">
                            </div>
                            <div class="img-user">
                                <img class="h-100 w-100 rounded-circle" src="/images/avatar/icon/avatar-3-wR29q9GN.png" alt="">
                            </div>
                            @if ($item->users_count < 4)
                            <div class="img-user">
                                <img class="h-100 w-100 rounded-circle" src="/images/avatar/icon/avatar-4-MfzD5fCs.png" alt="">
                            </div>
                            @else
                            <div class="img-user">
                                <div class="h-100 w-100 rounded-circle">+5</div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-4 p-2">
                <div class="p-3 bg-white rounded-3 shadow d-flex justify-content-between">
                    <div class="d-flex flex-column justify-content-between">
                        <div>
                            <img width="60px" src="/images/avatar/icon/pose_m1-qLsl3hEh.png" alt="">
                        </div>
                    </div>
                    <div>
                        <div class="img-users d-flex justify-content-end position-relative">
                            <a href="{{ route('create.role') }}" class="btn btn-primary btn-round ms-auto">Thêm vai trò</a>
                        </div>
                        <div class="img-users d-flex justify-content-end position-relative">
                            <p class="w-75 mt-2 text-end">Thêm vai trò nếu chưa tồn tại.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                    <h4 class="card-title">Quản lý vai trò</h4>
                    <a href="{{ route('create.role') }}" class="btn btn-primary btn-round ms-auto">
                        Thêm vai trò
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
                                <th>Vai trò</th>
                                <th>Mô tả ngắn</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th style="width: 10%">Action</th>
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
                              <td>{{ $item->email }}</td>
                              <td><span class="badge {{ $bgRole }}">{{ $item->role->name }}</span></td>
                              <td><span class="badge {{ $bgStatus }}">{{ $textStatus }}</span></td>
                              <td>
                                <div class="form-button-action">
                                  <a href="{{ route('show.role', ['id' => $item->id]) }}"
                                    data-bs-toggle="tooltip"
                                    title="Sửa"
                                    class="btn btn-link btn-primary btn-lg"
                                    data-original-title="Edit Task"
                                  >
                                    <i class="fa fa-edit"></i>
                                  </a>
                                  <form class="d-flex align-items-center" id="delete-form-{{ $item->id }}" method="POST" action="{{ route('delete.role', ['id' => $item->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                      data-bs-toggle="tooltip"
                                      title="Xóa"
                                      class="btn btn-link btn-danger delete"
                                      data-original-title="Remove"
                                      data-id="{{ $item->id }}"
                                    >
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