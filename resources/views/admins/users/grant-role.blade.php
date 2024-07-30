@extends('admins.layouts.master')

@section('script-bottom')
<script src="/libraries/axios/axios.min.js"></script>
<script src="/js/admins/async.js"></script>
<script src="/js/admins/datatable.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Cấp vai trò</h3>
            <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="#">
                <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Tài khoản</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Cấp vai trò</a>
            </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                    <h4 class="card-title">Cấp vai trò</h4>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table
                        id="multi-filter-select"
                        class="display table table-striped table-hover"
                        >
                        <thead>
                            <tr>
                                <td>Stt</td>
                                <th>Tên người dùng</th>
                                <th>Avatar</th>
                                <th>Email</th>
                                <th>Vai trò</th>
                                <th style="width: 10%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                                $roleClasses = [
                                    'Super Admin' => 'badge-success',
                                    'Editor' => 'badge-warning',
                                    'Author' => 'badge-primary',
                                    'Contributor' => 'badge-info',
                                    'Subscriber' => 'badge-secondary',
                                    'Support' => 'badge-danger',
                                ];
                                $roleClasseBgs = [
                                    'Super Admin' => 'btn-success',
                                    'Editor' => 'btn-warning',
                                    'Author' => 'btn-primary',
                                    'Contributor' => 'btn-info',
                                    'Subscriber' => 'btn-secondary',
                                    'Support' => 'btn-danger',
                                ];

                            @endphp
                            @foreach ($users as $item)
                                @php
                                    $bgRole = $roleClasses[$item->role->name] ?? 'badge-black';
                                @endphp
                            <tr>
                              <td>{{ $i++ }}</td>
                              <td>{{ $item->user_name }}</td>
                              <td><img class="rounded-circle" width="65px" src="{{ $item->avatar }}" alt=""></td>
                              <td>{{ $item->email }}</td>
                              <td class="text-center" id="role-{{$item->id}}"><span class="mx-auto badge {{ $bgRole }}">{{ $item->role->name }}</span></td>
                              <td>
                                <div class="d-flex">
                                    @foreach ($roles as $role)
                                        @php
                                            $btnRole = $roleClasseBgs[$role->name] ?? 'btn-black';
                                        @endphp
                                        @if ($role->name !== 'Super Admin')
                                            <button data-bs-toggle="tooltip"
                                            title="{{ $role->name }}"
                                            class="btn btn-icon btn-round {{$btnRole}} mx-2 p-1 btn-role"
                                            data-user-id="{{ $item->id }}"
                                            data-role-id="{{ $role->id }}"
                                            data-role-name="{{ $role->name }}"
                                            data-original-title="Edit Task"><i class="fas fa-user-check"></i></button>
                                        @endif
                                    @endforeach
                                </div>
                              </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection