@extends('admins.layouts.master')
@section('script-bottom')
    <script src="/js/admins/uploadimage.js"></script>
@endsection
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Thêm user</h3>
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
                        <a href="">Tài khoản</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Thêm người dùng</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <form class="row col-12" action="{{ route('store.user') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-form.input2 class="col-6" :error="$errors->first('email')" name="email" label="Email" type="text" />
                    <x-form.input2 class="col-6" :error="$errors->first('user_name')" name="user_name" label="Tên người dùng" type="text" />
                    <x-form.select-role class="col-6" :error="$errors->first('role_id')" name="role_id" label="Vai trò người dùng" />
                    <x-form.select-status-user class="col-6" :error="$errors->first('status')" name="status" />
                    <div class="col-12 form-group">
                        <button class="btn btn-primary">Thêm người dùng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
