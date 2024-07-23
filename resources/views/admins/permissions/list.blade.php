@extends('admins.layouts.master')
@section('script-bottom')
    <script>
      $(document).ready(function () {
        $("#multi-filter-select").DataTable({
          pageLength: 10,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });
      });
    </script>
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
                    <button type="button" class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Thêm quyền
                    </button>
                          
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
                                  <a href="{{ route('show.category', ['id' => $item->id]) }}"
                                    data-bs-toggle="tooltip"
                                    title="Sửa"
                                    class="btn btn-link btn-primary btn-lg"
                                    data-original-title="Edit Task"
                                  >
                                    <i class="fa fa-edit"></i>
                                  </a>
                                  <form class="d-flex align-items-center" id="delete-form-{{ $item->id }}" method="POST" action="{{ route('delete.category', ['id' => $item->id]) }}">
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
{{------------------- Modal -----------------------}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('store.permission') }}" class="modal-content">
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm quyền</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>   
                    <x-form.input2 class="col-12" :error="$errors->first('name')" name="name" label="Tên quyền" type="text" />
                    <x-form.input2 class="col-12" :error="$errors->first('description')" name="description" label="Mô tả" type="text" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">Thêm ngay</button>
            </div>
        </form>
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