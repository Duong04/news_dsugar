@extends('clients.layouts.master')

@section('header')
<x-layouts-client.header />
@endsection
@section('content')
    <div class="container py-5">
        <div>
            <strong>Chào bạn !</strong>
            <p>Chúc mừng bạn đã đăng ký tài khoản với chúng tôi!</p>
            <p>Chúng tôi đã gửi một <strong>email kích hoạt tài khoản đến địa chỉ email</strong>  mà bạn đã đăng ký. Để hoàn tất quá trình đăng ký, <strong>vui lòng kiểm tra hộp thư đến của bạn và nhấp vào liên kết kích hoạt được gửi trong email</strong> . Nếu bạn không tìm thấy email trong hộp thư đến, vui lòng kiểm tra thư mục thư rác hoặc thư mục "Spam".</p>
            <p>Nếu bạn gặp bất kỳ khó khăn nào trong việc kích hoạt tài khoản hoặc cần sự hỗ trợ bổ sung, đừng ngần ngại liên hệ với chúng tôi qua trang web hoặc qua địa chỉ email hỗ trợ của chúng tôi tại <a href="mailto:duongnt3092004@gmail.com"><strong>duongnt3092004@gmail.com</strong></a>. Chúng tôi luôn sẵn sàng hỗ trợ bạn.</p>
            <p>Trân trọng !</p>
        </div>
        <div class="d-flex justify-content-center mx-auto" style="max-width: 450px;">
            <img class="mx-auto w-100" src="images/8d4f7f858274a4a0eb507b49aee66385-removebg-preview.png" alt="">
        </div>
    </div>
@endsection
@section('footer')
<x-layouts-client.footer />
@endsection
