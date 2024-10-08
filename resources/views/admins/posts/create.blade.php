@extends('admins.layouts.master')

@section('script-bottom')
    <script>
      const BASE_URL = "{{ env('BASE_URL') }}";
    </script>
    <script src="/libraries/axios/axios.min.js"></script>
    <script type="module" src="/js/admins/async.js"></script>
    <script src="/js/admins/uploadimage.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Thêm bài viết</h3>
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
                <a href="{{ route('categories') }}">Bài viết</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Thêm bài viết</a>
            </li>
            </ul>
        </div>
        <div class="row">
          <form class="row col-12" action="{{ route('store.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-6 mb-3">
              <button class="btn btn-primary">Thêm bài viết</button>
            </div>
            <div class="col-8">
                <x-form.CkEditor class="col-12" :error="$errors->first('content')" name="content" label="Nội dung bài viết" />
            </div>
            <div class="col-4">
              <x-form.input2 class="col-12" :error="$errors->first('title')" name="title" label="Tiêu đề" type="text" />
              <x-form.textarea class="col-12" :error="$errors->first('description')" name="description" label="Mô tả ngắn" />
              <x-form.select class="col-12" classChild="categories" :id="null" type="categories" :error="$errors->first('category_id')" name="category_id" label="Danh mục" />
              <x-form.select class="col-12" classChild="subcategories" :id="null" type="subcategories" :error="$errors->first('category_id')" name="subcat_id" label="Danh mục con" />
              <x-form.input2 class="col-12" :error="$errors->first('image')" name="image" label="Ảnh bài viết" type="file" />
              <div class="col-12 form-group">
                <img id="preview" class="w-100" src="/images/7076ab1c0b9cd177babc715173427ce8.jpg" alt="">
              </div>
              <x-form.select-status class="col-12" :error="$errors->first('status')" name="status" />
              <div class="col-6 mt-3 form-group">
                <button class="btn btn-primary">Thêm bài viết</button>
              </div>
            </div>
          </form>

        </div>
    </div>
</div>
@endsection