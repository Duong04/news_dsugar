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
            <h3 class="fw-bold mb-3">Sửa danh mục</h3>
            <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="{{ route('dashboard') }}">
                <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="{{ route('categories') }}">Danh mục</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Sửa danh mục</a>
            </li>
            </ul>
        </div>
        <div class="row">
          <form class="row col-12" action="{{ route('update.category', ['id' => $category->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <x-form.input2 :value="$category->name" :error="$errors->first('name')" name="name" label="Tên danh mục" type="text" />
            <x-form.input2 :value="$category->description" :error="$errors->first('description')" name="description" label="Mô tả ngắn" type="text" />
            <div class="col-6 form-group">
              <button class="btn btn-primary">Sửa danh mục</button>
            </div>
          </form>

        </div>
    </div>
</div>
@endsection