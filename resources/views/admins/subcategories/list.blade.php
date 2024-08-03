@extends('admins.layouts.master')

@section('script-bottom')
<script src="/js/admins/datatable.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Danh mục con</h3>
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
                <a href="#">Danh mục</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Danh mục con</a>
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
                        Tạo danh mục
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
                              <th>Tên danh mục</th>
                              <th>Mô tả ngắn</th>
                              <th>Image</th>
                              <th>Danh mục</th>
                              <th>Ngày tạo</th>
                              <th>Ngày cập nhật</th>
                              <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <td>Stt</td>
                            <th>Tên danh mục</th>
                            <th>Mô tả ngắn</th>
                            <th>Image</th>
                            <th>Danh  mục</th>
                            <th>Ngày tạo</th>
                            <th>Ngày cập nhật</th>
                            <th style="width: 10%">Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($subcategories as $item)
                            <tr>
                              <td>{{ $i++ }}</td>
                              <td>{{ $item->name }}</td>
                              <td style="width: 150px;"><p class="description">{{ $item->description }}</p></td>
                              <th><img width="80px" src="{{ $item->image }}" alt=""></th>
                              <td>{{ $item->category->name }}</td>
                              <td>{{ $item->created_at }}</td>
                              <td>{{ $item->updated_at }}</td>
                              <td>
                                <div class="form-button-action">
                                  <a href="{{ route('show.subcategory', ['id' => $item->id]) }}"
                                    data-bs-toggle="tooltip"
                                    title="Sửa"
                                    class="btn btn-link btn-primary btn-lg"
                                    data-original-title="Edit Task"
                                  >
                                    <i class="fa fa-edit"></i>
                                  </a>
                                  <form class="d-flex align-items-center" id="delete-form-{{ $item->id }}" method="POST" action="{{ route('delete.subcategory', ['id' => $item->id]) }}">
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