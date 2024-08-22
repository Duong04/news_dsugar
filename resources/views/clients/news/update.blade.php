@extends('clients.layouts.master')

@section('header')
    <x-layouts-client.header />
@endsection
@section('css')
{{-- <link rel="stylesheet" href="/templates/css/kaiadmin.min.css" /> --}}
<link rel="stylesheet" href="/templates/css/plugins.min.css" />
<style>
    .ck-editor__editable_inline {
        height: auto;
    }
</style>
@endsection
@section('script-bottom')
<script>
    const BASE_URL = "{{ env('BASE_URL') }}";
</script>
<script src="/templates/js/core/jquery-3.7.1.min.js"></script>
<script type="module" src="/js/admins/async.js"></script>
<script src="/js/admins/uploadimage.js"></script>
<script src="/templates/js/setting-demo2.js"></script>
<script src="/admin_assets/plugins/ckeditor/ckeditor.js"></script>
<script src="/admin_assets/plugins/ckfinder_2/ckfinder.js"></script>
<script src="/admin_assets/library/finder.js"></script>
@endsection

@section('content')
<section class="py-5">
    <div class="container-md d-flex flex-column flex-lg-row mx-auto">
        <div class="row">
            <form class="row col-12" action="{{ route('client.store.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-6 mb-3 g-10">
                    <button name="action" value="pending" class="btn btn-purple">Gửi yêu cầu</button>
                    <button name="action" value="draft" class="btn btn-purple">Lưu bản nháp</button>
                </div>
                <div class="col-8">
                    <x-form.CkEditor class="col-12" :value="$post->content" :error="$errors->first('content')" name="content" label="Nội dung bài viết" />
                </div>
                <div class="col-4">
                    <x-form.input2 class="col-12" :value="$post->title" :error="$errors->first('title')" name="title" label="Tiêu đề" type="text" />
                    <x-form.textarea class="col-12" :value="$post->description" :error="$errors->first('description')" name="description" label="Mô tả ngắn" />
                    <x-form.select class="col-12" classChild="categories" :id="$post->category_id" type="categories" :error="$errors->first('category_id')" name="category_id" label="Danh mục" />
                    <x-form.select class="col-12" classChild="subcategories" :id="$post->subcat_id" type="subcategories" :error="$errors->first('category_id')" name="subcat_id" label="Danh mục con" />
                    <x-form.input2 class="col-12" :error="$errors->first('image')" name="image" label="Ảnh bài viết" type="file" />
                    <div class="col-12 form-group">
                        <img id="preview" class="w-100" src="{{$post->image}}" alt="">
                    </div>
                    <div class="col-12 mt-3 form-group d-flex g-10">
                        <button name="action" value="pending" class="btn btn-purple">Gửi yêu cầu</button>
                    <button name="action" value="draft" class="btn btn-purple">Lưu bản nháp</button>
                    </div>
              </div>
            </form>
  
        </div>
    </div>
</section>
@endsection

@section('footer')
    <x-layouts-client.footer />
@endsection
