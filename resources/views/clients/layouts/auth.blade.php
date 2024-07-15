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
            @yield('content')
        </section>
    </div>
    <div class="mouse-trail"></div>
    <script src="js/header.js"></script>
    <script src="libraries/bootstrap/popper.min.js"></script>
    <script src="libraries/bootstrap/bootstrap.min.js"></script>
</body>
</html>