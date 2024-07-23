@extends('admins.layouts.master')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Thêm danh mục</h3>
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
                        <a href="#">Thêm vai trò</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <form class="row col-12" action="{{ route('store.category') }}" method="POST">
                    @csrf
                    <x-form.input2 class="col-6" :error="$errors->first('name')" name="name" label="Tên danh mục" type="text" />
                    <x-form.input2 class="col-6" :error="$errors->first('description')" name="description" label="Mô tả ngắn" type="text" />
                    <div class="col-6 form-group">
                        <button class="btn btn-primary">Thêm danh mục</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
