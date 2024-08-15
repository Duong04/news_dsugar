<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="/" class="logo mx-auto pt-3">
                <img src="/images/logo_admin.png" alt="navbar brand" class="navbar-brand" height="80" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item active">
                    <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="dashboard">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('dashboard') }}">
                                    <span class="sub-item">Dashboard</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                @can('general-check', ['Categories Management', 'viewany'])
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Danh mục</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('categories') }}">
                                    <span class="sub-item">Danh mục cha</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('create.category') }}">
                                    <span class="sub-item">Tạo danh mục</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan
                @can('general-check', ['Subcategies Management', 'viewany'])
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#subcat">
                        <i class="fas fa-list-alt"></i>
                        <p>Danh mục con</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="subcat">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('subcategories') }}">
                                    <span class="sub-item">Danh mục con</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('create.subcategory') }}">
                                    <span class="sub-item">Tạo danh mục con</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan
                @can('general-check', ['Posts Management', 'viewany'])
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarLayouts">
                        <i class="fas fa-th-list"></i>
                        <p>Bài viết</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('posts') }}">
                                    <span class="sub-item">Bài viết</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('create.post') }}">
                                    <span class="sub-item">Thêm bài viết</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan
                @can('general-check', ['Users Management' ,'viewany'])
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#users">
                        <i class="fas fa-user"></i>
                        <p>Tài khoản</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="users">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('users') }}">
                                    <span class="sub-item">Tài khoản</span>
                                </a>
                            </li>
                            @can('general-check', ['Users Management' ,'grant.role'])
                            <li>
                                <a href="{{ route('grant.role') }}">
                                    <span class="sub-item">Cấp vai trò</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endcan
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#forms">
                        <i class="fas fa-pen-square"></i>
                        <p>Phân quyền</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="forms">
                        <ul class="nav nav-collapse">
                            @can('general-check', ['Roles Management', 'viewAny'])
                            <li>
                                <a href="{{ route('roles') }}">
                                    <span class="sub-item">Vai trò</span>
                                </a>
                            </li>
                            @endcan
                            @can('general-check', ['Permissions Management', 'viewAny'])
                            <li>
                                <a href="{{ route('permissions') }}">
                                    <span class="sub-item">Quyền người dùng</span>
                                </a>
                            </li>
                            @endcan
                            @can('general-check', ['Actions Management', 'viewAny'])
                            <li>
                                <a href="{{ route('actions') }}">
                                    <span class="sub-item">Actions</span>
                                </a>
                            </li>
                            @endcan
                            @can('general-check', ['Types Management', 'viewAny'])
                            <li>
                                <a href="{{ route('types') }}">
                                    <span class="sub-item">Types</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#tables">
                        <i class="fas fa-comment"></i>
                        <p>Bình luận</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="tables">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('comments') }}">
                                    <span class="sub-item">Danh sách bình luận</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="">
                        <i class="fas fa-list"></i>
                        <p>Kiểm duyệt bài viết</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
