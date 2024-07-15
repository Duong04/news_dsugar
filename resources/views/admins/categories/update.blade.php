@extends('admins.layouts.master')

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
            <x-form.input2 class="col-6" :value="$category->name" :error="$errors->first('name')" name="name" label="Tên danh mục" type="text" />
            <x-form.input2 class="col-6" :value="$category->description" :error="$errors->first('description')" name="description" label="Mô tả ngắn" type="text" />
            <div class="col-6 form-group">
              <button class="btn btn-primary">Sửa danh mục</button>
            </div>
          </form>

        </div>
    </div>
</div>
@endsection