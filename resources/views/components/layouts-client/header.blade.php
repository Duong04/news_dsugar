<header>
    <div class="bg-lightest">
        <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-center">
            <ul class="nav">
                <li class="nav-item">
                    <span class="nav-link text-midgray fs-7">June 28, 2024</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-midgray fs-7" href="#">Advertisement</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-midgray fs-7" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-midgray fs-7" href="#">Contact</a>
                </li>
            </ul>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link text-midgray fs-6 fb" href="#"><i
                            class="fa-brands fa-facebook-f"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-midgray fs-6 gh" href="#"><i class="fa-brands fa-github"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-midgray fs-6 lk" href="#"><i
                            class="fa-brands fa-linkedin-in"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-midgray fs-6 ins" href="#"><i
                            class="fa-brands fa-instagram"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="bg-white shadow-lg" id="header">
        <div class="container-md">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <div class="navbar-brand logo me-2 me-xl-5">
                        <a href="{{ route('home') }}"><img class="w-100" src="/images/logo.png" alt=""></a>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="d-flex g-5 position-relative navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item menu-far position-relative">
                                <a class="nav-link nav-link menu-hv fs-6" href="{{ route('home') }}">Trang chủ</a>
                            </li>
                            @foreach ($categories as $item)
                            <li class="nav-item menu-far position-relative">
                                <a class="nav-link menu-hv fs-6" href="{{ route('category', ['category' => $item->slug]) }}">{{ $item->name }} <i class="fa-solid fa-angle-down"></i></a>
                                <ul class="menu-child">
                                    @foreach ($item->subcategories as $subcategory)
                                    <li><a class="nav-link" href="{{ route('subcategory', ['category' => $item->slug, 'subcategory' => $subcategory->slug]) }}">{{ $subcategory->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                        <div class="d-flex g-10 align-items-center">
                            <x-search.search />
                            @auth
                            <div class="dropdown">
                                <a href="" class="account" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img class="w-100 h-100 rounded-circle" src="{{ Auth::user()->avatar }}" alt=""></a>                                
                                <ul style="left: -50px;" class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Tài khoản</a></li>
                                    <li><a class="dropdown-item" href="#">Thêm bài viết</a></li>
                                    @php
                                        $typeName = Auth::user()->role->typeRole->name;
                                    @endphp
                                    @if ($typeName == 'Administration' || $typeName == 'System')
                                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">Quản trị viên</a></li>
                                    @endif
                                    <li><form class="dropdown-item" action="{{ route('logout') }}" method="POST">@csrf <button class="nav-link">Đăng xuất</button></form></li>
                                </ul>
                            </div>
                            @endauth
                            @guest
                            <a href="{{ route('login') }}" class="account"><i class="fa-solid fa-user fs-7"></i></a>                                
                            @endguest
                            
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>