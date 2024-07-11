@extends('admins.layouts.master')

@section('script-top')
<script src="/templates/js/plugin/webfont/webfont.min.js"></script>
<script>
  WebFont.load({
    google: { families: ["Public Sans:300,400,500,600,700"] },
    custom: {
      families: [
        "Font Awesome 5 Solid",
        "Font Awesome 5 Regular",
        "Font Awesome 5 Brands",
        "simple-line-icons",
      ],
      urls: ["/templates/css/fonts.min.css"],
    },
    active: function () {
      sessionStorage.fonts = true;
    },
  });
</script>
@endsection
@section('css')
    <!-- CSS Files -->
    <link rel="stylesheet" href="/templates/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/templates/css/plugins.min.css" />
    <link rel="stylesheet" href="/templates/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="/templates/css/demo.css" />
@endsection
@section('script-bottom')
    <!--   Core JS Files   -->
    <script src="/templates/js/core/jquery-3.7.1.min.js"></script>
    <script src="/templates/js/core/popper.min.js"></script>
    <script src="/templates/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="/templates/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Datatables -->
    <script src="/templates/js/plugin/datatables/datatables.min.js"></script>
    <!-- Kaiadmin JS -->
    <script src="/templates/js/kaiadmin.min.js"></script>
    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="/templates/js/setting-demo2.js"></script>
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
            <h3 class="fw-bold mb-3">Danh mục</h3>
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
                <a href="#">Danh mục</a>
            </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                    <h4 class="card-title">Danh mục</h4>
                    <a href="{{route('create.category')}}"
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
                            <th>Ngày tạo</th>
                            <th>Ngày cập nhật</th>
                            <th style="width: 10%">Action</th>
                          </tr>
                        </tfoot>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($categories as $item)
                            <tr>
                              <td>{{ $i++ }}</td>
                              <td>{{ $item->name }}</td>
                              <td>{{ $item->description }}</td>
                              <td>{{ $item->created_at }}</td>
                              <td>{{ $item->updated_at }}</td>
                              <td>
                                <div class="form-button-action">
                                  <button
                                    type="button"
                                    data-bs-toggle="tooltip"
                                    title=""
                                    class="btn btn-link btn-primary btn-lg"
                                    data-original-title="Edit Task"
                                  >
                                    <i class="fa fa-edit"></i>
                                  </button>
                                  <button
                                    type="button"
                                    data-bs-toggle="tooltip"
                                    title=""
                                    class="btn btn-link btn-danger"
                                    data-original-title="Remove"
                                  >
                                    <i class="fa fa-times"></i>
                                  </button>
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