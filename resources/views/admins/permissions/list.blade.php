@extends('admins.layouts.master')
@section('script-bottom')
<script src="/libraries/axios/axios.min.js"></script>
<script src="/js/admins/datatable.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Quản lý quyền</h3>
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
                <a href="#">Quản lý quyền</a>
            </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                    <h4 class="card-title">Quản lý quyền</h4>
                    <a href="{{route('create.permission')}}"
                        class="btn btn-primary btn-round ms-auto"
                        >
                        <i class="fa fa-plus"></i>
                        Tạo quyền
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
                                <th>Tên quyền</th>
                                <th>Mô tả ngắn</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td>Stt</td>
                                <th>Tên quyền</th>
                                <th>Mô tả ngắn</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($permissions as $item)
                            <tr>
                              <td>{{ $i++ }}</td>
                              <td>{{ $item->name }}</td>
                              <td>{{ $item->description }}</td>
                              <td>{{ $item->created_at }}</td>
                              <td>{{ $item->updated_at }}</td>
                              <td>
                                <div class="form-button-action">
                                  <a href="{{ route('show.permission', ['id' => $item->id]) }}"
                                    title="Sửa"
                                    data-id="{{ $item->id }}" data-bs-toggle="tooltip"
                                    class="btn btn-link btn-primary btn-lg btn-edit-permission"
                                    data-original-title="Edit Task"
                                  >
                                    <i class="fa fa-edit"></i>
                                  </a>
                                  <form class="d-flex align-items-center" id="delete-form-{{ $item->id }}" method="POST" action="{{ route('delete.permission', ['id' => $item->id]) }}">
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
@error('name')
    @php
        toastr()->error($message);
    @endphp
@enderror
@error('description')
    @php
        toastr()->error($message);
    @endphp
@enderror
@endsection