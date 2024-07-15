@extends('admins.layouts.master')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Danh mục con</h3>
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
                <a href="#">Danh mục con</a>
            </li>
            </ul>
        </div>
        <div class="row">
          <form class="row col-12" action="{{ route('update.subcategory', ['id' => $subcategory->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <x-form.input2 class="col-6" :value="$subcategory->name" :error="$errors->first('name')" name="name" label="Tên danh mục" type="text" />
            <x-form.input2 class="col-6" :value="$subcategory->description" :error="$errors->first('description')" name="description" label="Mô tả ngắn" type="text" />
            <x-form.select class="col-6" classChild="categories" :id="$subcategory->category_id" type="categories" :error="$errors->first('category_id')" name="category_id" label="Danh mục con" />
            <div class="col-12 form-group">
              <button class="btn btn-primary">Cập nhật</button>
            </div>
          </form>

        </div>
    </div>
</div>
@endsection