@extends('admins.layouts.master')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Cập nhật quyền</h3>
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
                        <a href="{{ route('categories') }}">Phân quyền</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Cập nhật quyền</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <form class="row col-12" action="{{ route('update.permission', ['id' => $permission->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-form.input2 :value="$permission->name" class="col-6" :error="$errors->first('name')" name="name" label="Tên quyền" type="text" />
                    <x-form.input2 :value="$permission->description" class="col-6" :error="$errors->first('description')" name="description" label="Mô tả" type="text" />
                    <div class="col-12">
                        <h6>Cho phép thao tác</h6>
                        <div class="row gutters-xs">
                            @foreach ($actions as $action)
                            <x-form.checkbox name="actions[]" :checked="$permission->permissionActions->contains('action_id', $action->id)" className="check-action" id="checkbox-{{$action->id}}" value="{{$action->id}}" label="{{ $action->name }}" />
                            @endforeach
                        </div>
                    </div>
                    <div class="col-6 form-group">
                        <button class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
