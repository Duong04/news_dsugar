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
          <form class="row col-12" action="{{ route('store.category') }}" method="POST">
            @csrf
            <div class="col-12 row">
                <div class="row mx-0">
                    <x-form.input2 class="col-6" :error="$errors->first('name')" name="name" label="Tên vai trò" type="text" />
                    <x-form.input2 class="col-6" :error="$errors->first('description')" name="description" label="Mô tả ngắn" type="text" />
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
                                    <input type="hidden" name="permission_id[]" value="{{$item->id}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row gutters-xs">
                                    <x-form.checkbox name="action" className="check-action" id="create-{{$item->id}}" value="true" label="CREATE" />
                                    <x-form.checkbox name="action" className="check-action" id="read-{{$item->id}}" value="true" label="READ" />
                                    <x-form.checkbox name="action" className="check-action" id="update-{{$item->id}}" value="true" label="UPDATE" />
                                    <x-form.checkbox name="action" className="check-action" id="delete-{{$item->id}}" value="true" label="DELETE" />
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