@extends('admins.layouts.master')
@section('script-bottom')
    <script src="/libraries/axios/axios.min.js"></script>
    <script type="module" src="/js/admins/async.js"></script>
    <script src="/js/admins/datatable.js"></script>
    <script src="/libraries/toastr/toastr.min.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Bài viết</h3>
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
                        <a href="#">Bài viết</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Bài viết</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4 class="card-title">Bài viết</h4>
                            <a href="{{ route('create.post') }}" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i>
                                Thêm bài viết
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <td>Stt</td>
                                            <th>Tên danh mục</th>
                                            <th>Ảnh</th>
                                            <th>Tác giả</th>
                                            <th>Danh mục</th>
                                            <th>Danh mục con</th>
                                            <th>Trạng thái</th>
                                            <th>Ngày tạo</th>
                                            <th style="width: 10%">Duyệt</th>
                                            <th style="width: 10%">Từ chối</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                            $statusPost = [
                                                'draft' => ['Bản nháp', 'badge-warning'],
                                                'published' => ['Đã xuất bản', 'badge-success'],
                                                'archived' => ['Lưu trữ', 'badge-info'],
                                                'pending' => ['Chờ kiểm duyệt', 'badge-secondary'],
                                                'rejected' => ['Đã từ chối', 'badge-danger'],
                                            ];
                                        @endphp
                                        @foreach ($posts as $item)
                                            @php
                                                $textStatus = $statusPost[$item->status][0];
                                                $bgStatus = $statusPost[$item->status][1];
                                            @endphp
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>
                                                    <div style="width: 180px;">{{ $item->title }}</div>
                                                </td>
                                                <td><img width="80px" src="{{ $item->image }}" alt=""></td>
                                                <td>
                                                    <div style="width: 150px;">{{ $item->user->user_name }}</div>
                                                </td>
                                                <td>
                                                    <div style="width: 150px;">{{ $item->category->name }}</div>
                                                </td>
                                                <td>
                                                    <div style="width: 150px;">{{ $item->subcategory->name }}</div>
                                                </td>
                                                <td>
                                                    <div class="status-{{ $item->id }}">
                                                        <div style="width: 100px;" class="badge {{ $bgStatus }}">
                                                            {{ $textStatus }}</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div style="width: 150px;">{{ $item->created_at }}</div>
                                                </td>
                                                <td>
                                                    <div class="toggle-container">
                                                        <input type="checkbox" class="toggle-input publish publish-{{ $item->id }}" data-id="{{ $item->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 292 142"
                                                            class="toggle">
                                                            <path
                                                                d="M71 142C31.7878 142 0 110.212 0 71C0 31.7878 31.7878 0 71 0C110.212 0 119 30 146 30C173 30 182 0 221 0C260 0 292 31.7878 292 71C292 110.212 260.212 142 221 142C181.788 142 173 112 146 112C119 112 110.212 142 71 142Z"
                                                                class="toggle-background"></path>
                                                            <rect rx="6" height="64" width="12" y="39" x="64"
                                                                class="toggle-icon on"></rect>
                                                            <path
                                                                d="M221 91C232.046 91 241 82.0457 241 71C241 59.9543 232.046 51 221 51C209.954 51 201 59.9543 201 71C201 82.0457 209.954 91 221 91ZM221 103C238.673 103 253 88.6731 253 71C253 53.3269 238.673 39 221 39C203.327 39 189 53.3269 189 71C189 88.6731 203.327 103 221 103Z"
                                                                fill-rule="evenodd" class="toggle-icon off"></path>
                                                            <g filter="url('#goo')">
                                                                <rect fill="#fff" rx="29" height="58"
                                                                    width="116" y="42" x="13"
                                                                    class="toggle-circle-center"></rect>
                                                                <rect fill="#fff" rx="58" height="114"
                                                                    width="114" y="14" x="14" class="toggle-circle left">
                                                                </rect>
                                                                <rect fill="#fff" rx="58" height="114"
                                                                    width="114" y="14" x="164"
                                                                    class="toggle-circle right"></rect>
                                                            </g>
                                                            <filter id="goo">
                                                                <feGaussianBlur stdDeviation="10" result="blur"
                                                                    in="SourceGraphic"></feGaussianBlur>
                                                                <feColorMatrix result="goo"
                                                                    values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7"
                                                                    mode="matrix" in="blur"></feColorMatrix>
                                                            </filter>
                                                        </svg>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="toggle-container">
                                                        <input type="checkbox" class="toggle-input-2 reject reject-{{ $item->id }}" data-id="{{ $item->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 292 142"
                                                            class="toggle">
                                                            <path
                                                                d="M71 142C31.7878 142 0 110.212 0 71C0 31.7878 31.7878 0 71 0C110.212 0 119 30 146 30C173 30 182 0 221 0C260 0 292 31.7878 292 71C292 110.212 260.212 142 221 142C181.788 142 173 112 146 112C119 112 110.212 142 71 142Z"
                                                                class="toggle-background"></path>
                                                            <rect rx="6" height="64" width="12" y="39" x="64"
                                                                class="toggle-icon on"></rect>
                                                            <path
                                                                d="M221 91C232.046 91 241 82.0457 241 71C241 59.9543 232.046 51 221 51C209.954 51 201 59.9543 201 71C201 82.0457 209.954 91 221 91ZM221 103C238.673 103 253 88.6731 253 71C253 53.3269 238.673 39 221 39C203.327 39 189 53.3269 189 71C189 88.6731 203.327 103 221 103Z"
                                                                fill-rule="evenodd" class="toggle-icon off"></path>
                                                            <g filter="url('#goo')">
                                                                <rect fill="#fff" rx="29" height="58"
                                                                    width="116" y="42" x="13"
                                                                    class="toggle-circle-center"></rect>
                                                                <rect fill="#fff" rx="58" height="114"
                                                                    width="114" y="14" x="14" class="toggle-circle left">
                                                                </rect>
                                                                <rect fill="#fff" rx="58" height="114"
                                                                    width="114" y="14" x="164"
                                                                    class="toggle-circle right"></rect>
                                                            </g>
                                                            <filter id="goo">
                                                                <feGaussianBlur stdDeviation="10" result="blur"
                                                                    in="SourceGraphic"></feGaussianBlur>
                                                                <feColorMatrix result="goo"
                                                                    values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7"
                                                                    mode="matrix" in="blur"></feColorMatrix>
                                                            </filter>
                                                        </svg>
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="{{ route('show.post', ['id' => $item->id]) }}"
                                                            data-bs-toggle="tooltip" title="Sửa"
                                                            class="btn btn-link btn-primary btn-lg"
                                                            data-original-title="Edit Task">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form class="d-flex align-items-center"
                                                            id="delete-form-{{ $item->id }}" method="POST"
                                                            action="{{ route('delete.post', ['id' => $item->id]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button data-bs-toggle="tooltip" title="Xóa"
                                                                class="btn btn-link btn-danger delete"
                                                                data-original-title="Remove" data-id="{{ $item->id }}">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </form>
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
