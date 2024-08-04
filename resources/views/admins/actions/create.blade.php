@extends('admins.layouts.master')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Tạo action</h3>
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
                        <a href="{{ route('roles') }}">Phân quyền</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tạo action</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <form class="row col-12" action="{{ route('store.action') }}" method="POST">
                    @csrf
                    <x-form.input2 class="col-6" :error="$errors->first('name')" name="name" label="Tên action" type="text" />
                    <x-form.input2 class="col-6" :error="$errors->first('value')" name="value" label="Value" type="text" />
                    <div class="col-12">
                        <h6>Cho phép thuộc quyền nào</h6>
                        <div class="row gutters-xs">
                            @foreach ($permissions as $item)
                            <x-form.checkbox name="permissions[]" className="check-action" id="checkbox-{{$item->id}}" value="{{$item->id}}" label="{{ $item->name }}" />
                            @endforeach
                        </div>
                    </div>
                    <div class="col-6 form-group">
                        <button class="btn btn-primary">Thêm ngay</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
