@extends('admins.layouts.master')

@section('script-bottom')
    <script>
      const BASE_URL = "{{ env('BASE_URL') }}";
    </script>
    <script src="/libraries/axios/axios.min.js"></script>
    <script src="/js/admins/async.js"></script>
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
                <a href="{{ route('categories') }}">Danh mục</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Thêm danh mục</a>
            </li>
            </ul>
        </div>
        <div class="row">
          <form class="row col-12" action="{{ route('store.category') }}" method="POST">
            @csrf
            <div class="col-8">
                <textarea id="editor" class="ck-editor w-100"></textarea>
            </div>
            <div class="col-4">
              <x-form.input2 class="col-12" :error="$errors->first('title')" name="title" label="Tiêu đề" type="text" />
              <x-form.textarea class="col-12" :error="$errors->first('description')" name="description" label="Mô tả ngắn" />
              <x-form.select class="col-12" classChild="categories" :id="null" type="categories" :error="$errors->first('category_id')" name="category_id" label="Danh mục" />
              <x-form.select class="col-12" classChild="subcategories" :id="null" type="subcategories" :error="$errors->first('category_id')" name="category_id" label="Danh mục con" />
            </div>
            <div class="col-6 mt-3">
              <button class="btn btn-primary">Thêm bài viết</button>
            </div>
          </form>

        </div>
    </div>
</div>
@endsection