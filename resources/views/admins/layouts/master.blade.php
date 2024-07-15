<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link
      rel="icon"
      href="/templates/img/kaiadmin/favicon.ico"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="/templates/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["/templates/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="/templates/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/templates/css/plugins.min.css" />
    <link rel="stylesheet" href="/templates/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="/templates/css/demo.css" />
    <style>
      .ck-editor__editable_inline {
          min-height: 500px;
      }
  </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <x-layouts-admin.aside />
        <!-- End Sidebar -->
  
        <div class="main-panel">
          <x-layouts-admin.header />
  
          @yield('content')
  
          <x-layouts-admin.footer />
        </div>
  
        <!-- Custom template | don't include it in your project! -->
        <div class="custom-template">
          <div class="title">Settings</div>
          <div class="custom-content">
            <div class="switcher">
              <div class="switch-block">
                <h4>Logo Header</h4>
                <div class="btnSwitch">
                  <button
                    type="button"
                    class="selected changeLogoHeaderColor"
                    data-color="dark"
                  ></button>
                  <button
                    type="button"
                    class="changeLogoHeaderColor"
                    data-color="blue"
                  ></button>
                  <button
                    type="button"
                    class="changeLogoHeaderColor"
                    data-color="purple"
                  ></button>
                  <button
                    type="button"
                    class="changeLogoHeaderColor"
                    data-color="light-blue"
                  ></button>
                  <button
                    type="button"
                    class="changeLogoHeaderColor"
                    data-color="green"
                  ></button>
                  <button
                    type="button"
                    class="changeLogoHeaderColor"
                    data-color="orange"
                  ></button>
                  <button
                    type="button"
                    class="changeLogoHeaderColor"
                    data-color="red"
                  ></button>
                  <button
                    type="button"
                    class="changeLogoHeaderColor"
                    data-color="white"
                  ></button>
                  <br />
                  <button
                    type="button"
                    class="changeLogoHeaderColor"
                    data-color="dark2"
                  ></button>
                  <button
                    type="button"
                    class="changeLogoHeaderColor"
                    data-color="blue2"
                  ></button>
                  <button
                    type="button"
                    class="changeLogoHeaderColor"
                    data-color="purple2"
                  ></button>
                  <button
                    type="button"
                    class="changeLogoHeaderColor"
                    data-color="light-blue2"
                  ></button>
                  <button
                    type="button"
                    class="changeLogoHeaderColor"
                    data-color="green2"
                  ></button>
                  <button
                    type="button"
                    class="changeLogoHeaderColor"
                    data-color="orange2"
                  ></button>
                  <button
                    type="button"
                    class="changeLogoHeaderColor"
                    data-color="red2"
                  ></button>
                </div>
              </div>
              <div class="switch-block">
                <h4>Navbar Header</h4>
                <div class="btnSwitch">
                  <button
                    type="button"
                    class="changeTopBarColor"
                    data-color="dark"
                  ></button>
                  <button
                    type="button"
                    class="changeTopBarColor"
                    data-color="blue"
                  ></button>
                  <button
                    type="button"
                    class="changeTopBarColor"
                    data-color="purple"
                  ></button>
                  <button
                    type="button"
                    class="changeTopBarColor"
                    data-color="light-blue"
                  ></button>
                  <button
                    type="button"
                    class="changeTopBarColor"
                    data-color="green"
                  ></button>
                  <button
                    type="button"
                    class="changeTopBarColor"
                    data-color="orange"
                  ></button>
                  <button
                    type="button"
                    class="changeTopBarColor"
                    data-color="red"
                  ></button>
                  <button
                    type="button"
                    class="selected changeTopBarColor"
                    data-color="white"
                  ></button>
                  <br />
                  <button
                    type="button"
                    class="changeTopBarColor"
                    data-color="dark2"
                  ></button>
                  <button
                    type="button"
                    class="changeTopBarColor"
                    data-color="blue2"
                  ></button>
                  <button
                    type="button"
                    class="changeTopBarColor"
                    data-color="purple2"
                  ></button>
                  <button
                    type="button"
                    class="changeTopBarColor"
                    data-color="light-blue2"
                  ></button>
                  <button
                    type="button"
                    class="changeTopBarColor"
                    data-color="green2"
                  ></button>
                  <button
                    type="button"
                    class="changeTopBarColor"
                    data-color="orange2"
                  ></button>
                  <button
                    type="button"
                    class="changeTopBarColor"
                    data-color="red2"
                  ></button>
                </div>
              </div>
              <div class="switch-block">
                <h4>Sidebar</h4>
                <div class="btnSwitch">
                  <button
                    type="button"
                    class="changeSideBarColor"
                    data-color="white"
                  ></button>
                  <button
                    type="button"
                    class="selected changeSideBarColor"
                    data-color="dark"
                  ></button>
                  <button
                    type="button"
                    class="changeSideBarColor"
                    data-color="dark2"
                  ></button>
                </div>
              </div>
            </div>
          </div>
          <div class="custom-toggle">
            <i class="icon-settings"></i>
          </div>
        </div>
        <!-- End Custom template -->
    </div>
    <script src="/templates/js/core/jquery-3.7.1.min.js"></script>
    <script src="/templates/js/core/popper.min.js"></script>
    <script src="/templates/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="/templates/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Datatables -->
    <script src="/templates/js/plugin/datatables/datatables.min.js"></script>
    <!-- Kaiadmin JS -->
    <script src="/templates/js/kaiadmin.min.js"></script>
    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="/templates/js/setting-demo2.js"></script>
    <script src="/admin_assets/plugins/ckeditor/ckeditor.js"></script>
    <script src="/admin_assets/plugins/ckfinder_2/ckfinder.js"></script>
    <script src="/admin_assets/library/finder.js"></script>
    
    <script src="/templates/js/setting-demo2.js"></script>
    <script src="/templates/js/plugin/sweetalert/sweetalert.min.js"></script>
    <script src="/templates/js/sweetalert.js"></script>
    @yield('script-bottom')
</body>
</html>