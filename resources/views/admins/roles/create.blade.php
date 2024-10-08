@extends('admins.layouts.master')

@section('script-bottom')
<script src="/js/admins/main.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Thêm vai trò</h3>
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
                <a href="#">Thêm vai trò</a>
            </li>
            </ul>
        </div>
        <div class="row">
          <form class="row col-12" action="{{ route('store.role') }}" method="POST">
            @csrf
            <div class="col-6 form-group">
                <button class="btn btn-primary">Thêm vai trò</button>
            </div>
            <div class="col-12 row">
                <div class="row mx-0">
                    <x-form.input2 class="col-4" :error="$errors->first('name')" name="name" label="Tên vai trò" type="text" />
                    <x-form.input2 class="col-4" :error="$errors->first('description')" name="description" label="Mô tả ngắn" type="text" />
                    <x-form.select-type class="col-4" :error="$errors->first('type')" value="{{null}}" name="type" />
                </div>
                <div class="col-12">
                    <div class="form-group d-flex justify-content-between">
                        <h5>Quyền của vai trò</h5>
                        <x-form.checkbox name="select-all" className="" id="select-all" value="true" label="Chọn tất cả" />
                    </div>
                    @foreach ($permissions as $item)
                        <div class="col-12 d-flex justify-content-between">
                            <div class="form-group">
                                <div>
                                    <label for="">{{$item->name}}</label>
                                    <input type="hidden" class="parent-checkbox-{{$item->id}}" hidden name="permission_id[]" value="{{$item->id}}">
                                </div>
                            </div>
                            <div class="form-group form-check-{{$item->id}}">
                                <div class="row gutters-xs">
                                    @php
                                        $allowedActions = $item->permissionActions->pluck('action_id')->toArray();
                                    @endphp
                                    @foreach ($actions as $action)
                                        @if (in_array($action->id, $allowedActions))
                                        <x-form.checkbox name="actions[{{$item->id}}][]" className="check-action" id="checkbox-{{$action->id}}-{{$item->id}}" value="{{$action->id}}" label="{{ $action->name }}" />
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-6 form-group">
                <button class="btn btn-primary">Thêm vai trò</button>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection