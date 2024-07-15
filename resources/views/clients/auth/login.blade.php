@extends('clients.layouts.auth')

@section('content')
<div class="col-12 col-lg-6 pb-5">
    <div class="p-4"><a href="./" class="text-decoration-none text-black link-back-home"><i class="fa-solid fa-house text-blue"></i> <span>Quay về trang chủ</span></a></div>
    <div class="mt-4 d-flex flex-column justify-content-center col-10 col-sm-7 col-md-6 col-lg-7 mx-auto">
        <h4 class="text-center fw-semibold">Hi, Welcome Back!</h4>
        <p class="text-center text-midgray">Chào mừng bạn quay lại. Với tư cách là khách hàng cũ, bạn có quyền truy cập vào tất cả thông tin đã lưu trước đó của mình.</p>
        <div class="main-form">
            <form action="{{ route('action.login') }}" method="POST">
                @csrf
                <x-form.input :error="$errors->first('email')" name="email" label="Email của bạn" type="text" icon="fa-regular fa-envelope" />
                <x-form.input :error="$errors->first('password')" name="password" label="Mật khẩu" type="password" icon="fa-regular fa-eye" />
                <div class="mt-3 d-flex justify-content-between">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Nhớ mật khẩu
                        </label>
                    </div>
                    <a href="" class="text-decoration-none">Bạn quên mật khẩu?</a>
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary w-100 py-2">Đăng nhập</button>
                </div>
                <div class="mt-3 btn btn-lightest w-100 d-flex align-items-center justify-content-center g-10">
                    <img style="width: 28px" height="28px" src="images/gg.png" alt="">
                    Đăng nhập bằng Google
                </div>
            </form>
            <div class="text-center mt-3">Bạn chưa có tài khoản? <a href="{{ route('register') }}" class="text-decoration-none">Đăng ký</a></div>
        </div>
    </div>
</div>
@endsection