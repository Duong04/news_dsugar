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
    <link href="/libraries/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/libraries/splide/splide.min.css">
</head>
</head>

<body>
    <div id="app">
        @yield('header')
        @yield('content')
        @yield('footer')
        <div class="py-3 bg-lightest text-center fs-7 text-midgray">© 2024 copy right duongnt3092004</div>
    </div>
    <div class="go-to-top">
        <a class="text-decoration-none rounded-circle text-white h-100 w-100 d-flex justify-content-center align-items-center" href="#"><i class="fa-solid fa-chevron-down fa-rotate-180"></i></a>
    </div>
    <div class="mouse-trail"></div>
    <script src="/libraries/bootstrap/popper.min.js"></script>
    <script src="/libraries/bootstrap/bootstrap.min.js"></script>
    <script src="/libraries/splide/splide.min.js"></script>
    <script src="/js/slider.js"></script>
    <script src="/js/header.js"></script>
    @yield('script-bottom')
</body>

</html>
