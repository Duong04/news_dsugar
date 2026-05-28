@extends('clients.layouts.master')

@section('header')
    <x-layouts-client.header />
@endsection
@section('css')
    <link rel="stylesheet" href="/templates/css/plugins.min.css" />
    <link rel="stylesheet" href="/css/custom.css" />
@endsection
@section('script-bottom')
    <script src="/templates/js/core/jquery-3.7.1.min.js"></script>
    <script src="/js/admins/datatable.js"></script>
    <script src="/templates/js/plugin/datatables/datatables.min.js"></script>
    <script src="/templates/js/kaiadmin.min.js"></script>
    <script src="/templates/js/plugin/chart.js/chart.umd.js"></script>
    <script type="module" src="/js/stats.js"></script>
    <script src="/templates/js/plugin/sweetalert/sweetalert.min.js"></script>
    <script src="/templates/js/sweetalert.js"></script>
    <script src="/js/uploadImage.js"></script>
    <script>
        window.auth = {
            isAuthenticated: {{ Auth::check() ? 'true' : 'false' }},
            user: @json(Auth::user())
        };
    </script>
@endsection

@section('content')
    <section class="py-5">
        <div class="container-md d-flex flex-column flex-lg-row mx-auto">
            <aside class="col-4 pe-5">
                <div class="py-5 bg-white aside-shadow">
                    <div class="text-center">
                        <div class="img-avatar mx-auto">
                            <img class="w-100 h-100 rounded-circle object-fit-cover" src="{{ Auth::user()->avatar }}" alt="">
                        </div>
                        <h5 class="fs-5 mt-3">{{ Auth::user()->user_name }}</h5>
                        <span class="badge text-bg-success">{{ Auth::user()->role->name }}</span>
                    </div>
                    <div class="rp-task mx-auto d-flex flex-column g-20 mt-4">
                        <div class="d-flex g-10 align-items-center">
                            <div class="box-purple">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <div class="d-flex flex-column">
                                <span>1,230</span>
                                <span>Task Done</span>
                            </div>
                        </div>
                        <div class="d-flex g-10 align-items-center">
                            <div class="box-purple">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <div class="d-flex flex-column">
                                <span>1,230</span>
                                <span>Task Done</span>
                            </div>
                        </div>
                    </div>
                    <div class="px-3">
                        <h6 class="py-0">Chi tiết</h6>
                        <hr>
                        <ul class="nav d-flex flex-column g-10">
                            <li class="fs-7">
                                <span class="fw-semibold">Nick name:</span>
                                <span class="text-midgray">{{ Auth::user()->user_name }}</span>
                            </li>
                            <li class="fs-7">
                                <span class="fw-semibold">Email:</span>
                                <span class="text-midgray">{{ Auth::user()->email }}</span>
                            </li>
                            <li class="fs-7">
                                <span class="fw-semibold">Tên:</span>
                                <span
                                    class="text-midgray">{{ Auth::user()->first_name ? Auth::user()->first_name : 'Chưa cập nhật thông tin' }}</span>
                            </li>
                            <li class="fs-7">
                                <span class="fw-semibold">Họ:</span>
                                <span
                                    class="text-midgray">{{ Auth::user()->last_name ? Auth::user()->last_name : 'Chưa cập nhật thông tin' }}</span>
                            </li>
                            <li class="fs-7">
                                <span class="fw-semibold">Địa chỉ:</span>
                                <span
                                    class="text-midgray">{{ Auth::user()->address ? Auth::user()->address : 'Chưa cập nhật thông tin' }}</span>
                            </li>
                            <li class="fs-7">
                                <span class="fw-semibold">Địa chỉ:</span>
                                <span
                                    class="text-midgray">{{ Auth::user()->phone_number ? Auth::user()->phone_number : 'Chưa cập nhật thông tin' }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn btn-purple">Chỉnh sửa</button>
                    </div>
                </div>
            </aside>
            <article class="col-8">
                <div class="tab-content w-100">
                    <div id="tab-4" class="mt-4 tab-pane fade show {{ Auth::user()->role->name == 'Subscriber' || Auth::user()->role->name == 'Support' ? 'active' : ''}}">
                        <h4>Các trạng thái bài viết</h4>
                        <form class="row" enctype="multipart/form-data" action="{{ route('update.profile', ['id' => Auth::user()->id]) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="col-12 mb-3">
                                <div class="avatar-image mx-auto">
                                    <img width="100%" height="100%" class="rounded-circle" src="{{ Auth::user()->avatar }}" id="image-avatar" alt="">
                                    <input type="file" name="avatar" id="avatar" hidden>
                                    <label for="avatar"><i class="fa-solid fa-camera-retro"></i></label>
                                    <span>{{$errors->first('avatar')}}</span>
                                </div>
                            </div>
                            <x-form.input2 :error="$errors->first('email')" class="col-6" name="Email" label="Email của bạn" :value="Auth::user()->email" type="text" />
                            <x-form.input2 :error="$errors->first('user_name')" class="col-6" name="user_name" label="Nick name của bạn" :value="Auth::user()->user_name" type="text" />
                            <x-form.input2 :error="$errors->first('first_name')" class="col-6" name="first_name" label="Tên của bạn" :value="Auth::user()->first_name" type="text" />
                            <x-form.input2 :error="$errors->first('last_name')" class="col-6" name="last_name" label="Họ của bạn" :value="Auth::user()->last_name" type="text" />
                            <x-form.input2 :error="$errors->first('address')" class="col-6" name="address" label="Địa chỉ của bạn" :value="Auth::user()->address" type="text" />
                            <x-form.input2 :error="$errors->first('phone')" class="col-6" name="phone" label="Số điện của bạn" :value="Auth::user()->phone" type="text" />
                            <div class="form-group">
                                <button class="btn btn-purple">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </article>
        </div>
        </article>
        </div>
    </section>
@endsection

@section('footer')
    <x-layouts-client.footer />
@endsection
