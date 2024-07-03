<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="libraries/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <section class="d-flex mh-100">
            <div class="col-6 d-none bg-lightest d-lg-flex justify-content-center align-items-center">
                <img class="w-75" src="images/bg-login.png" alt="">
            </div>
            <div class="col-12 col-lg-6 pb-5">
                <div class="p-4"><a href="./" class="text-decoration-none text-black link-back-home"><i class="fa-solid fa-house text-blue"></i> <span>Quay về trang chủ</span></a></div>
                <div class="mt-4 d-flex flex-column justify-content-center col-10 col-sm-7 col-md-6 col-lg-7 mx-auto">
                    <h4 class="text-center fw-semibold">Hi, Welcome Back!</h4>
                    <p class="text-center text-midgray">Chào mừng bạn quay lại. Với tư cách là khách hàng cũ, bạn có quyền truy cập vào tất cả thông tin đã lưu trước đó của mình.</p>
                    <div class="main-form">
                        <form action="">
                            <x-form.input name="user_name" label="Tên người dùng" type="text" icon="fa-regular fa-user" />
                            <x-form.input name="email" label="Email của bạn" type="text" icon="fa-regular fa-envelope" />
                            <x-form.input name="confirm-psw" label="Xác nhận mật khẩu" type="password" icon="fa-regular fa-eye" />
                            <x-form.input name="password" label="Mật khẩu" type="password" icon="fa-regular fa-eye" />
                            <div class="mt-4">
                                <button class="btn btn-primary w-100 py-2">Đăng ký</button>
                            </div>
                            <div class="mt-3 btn btn-lightest w-100 d-flex align-items-center justify-content-center g-10">
                                <img style="width: 28px" height="28px" src="images/gg.png" alt="">
                                Đăng ký bằng Google
                            </div>
                        </form>
                        <div class="text-center mt-3">Bạn đã có tài khoản? <a href="" class="text-decoration-none">Đăng nhập</a></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="mouse-trail"></div>
    <script src="libraries/bootstrap/popper.min.js"></script>
    <script src="libraries/bootstrap/bootstrap.min.js"></script>
</body>
</html>