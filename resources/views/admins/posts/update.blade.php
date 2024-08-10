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
            <h3 class="fw-bold mb-3">Bài viết</h3>
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
                    <a href="#">Cập nhật bài viết</a>
                </li>
            </ul>
        </div>
        <div class="row">
          <form class="row col-12" action="{{ route('update.post', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-6 mb-3">
              <button class="btn btn-primary">Cập nhật bài viết</button>
            </div>
            <div class="col-8">
                <x-form.CkEditor :value="$post->content" class="col-12" :error="$errors->first('content')" name="content" label="Nội dung bài viết" />
            </div>
            <div class="col-4">
              <x-form.input2 :value="$post->title" class="col-12" :error="$errors->first('title')" name="title" label="Tiêu đề" type="text" />
              <x-form.textarea :value="$post->description" class="col-12" :error="$errors->first('description')" name="description" label="Mô tả ngắn" />
              <x-form.select class="col-12" classChild="categories" :id="$post->category_id" type="categories" :error="$errors->first('category_id')" name="category_id" label="Danh mục" />
              <x-form.select class="col-12" classChild="subcategories" :id="$post->subcat_id" type="subcategories" :error="$errors->first('category_id')" name="subcat_id" label="Danh mục con" />
              <x-form.input2 class="col-12" :error="$errors->first('image')" name="image" label="Ảnh bài viết" type="file" />
              <div class="col-12 form-group">
                <img id="preview" class="w-100" src="{{$post->image}}" alt="">
              </div>
              <x-form.select-status :value="$post->status" class="col-12" :error="$errors->first('status')" name="status" />
              <div class="col-6 mt-3 form-group">
                <button class="btn btn-primary">Cập nhật bài viết</button>
              </div>
            </div>
          </form>

        </div>
    </div>
</div>
@endsection