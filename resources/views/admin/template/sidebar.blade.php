<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}"
                        class="nav-link {{ Route::is('admin.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Kursus
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('admin.kursus') }}"
                                class="nav-link @if (Route::is('admin.kursus')) active @endif">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    List
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.category.index') }}"
                                class="nav-link @if (Route::is('admin.category.index')) active @endif">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Category
                                </p>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="nav-item @if (in_array(Route::currentRouteName(), ['admin.setting.sections', 'admin.setting.content'])) menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link @if (in_array(Route::currentRouteName(), ['admin.setting.sections', 'admin.setting.content'])) active @endif">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview"
                        @if (in_array(Route::currentRouteName(), ['admin.setting.sections', 'admin.setting.content'])) style="display: block" @else style="display: none;" @endif>
                        <li class="nav-item">
                            <a href="{{ route('admin.setting.sections') }}"
                                class="nav-link @if (Route::is('admin.setting.sections')) active @endif">
                                <i class="nav-icon fas fa-file-export ml-4"></i>
                                <p>
                                    Section
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.setting.content') }}"
                                class="nav-link @if (Route::is('admin.setting.content')) active @endif">
                                <i class="nav-icon fas fa-layer-group ml-4"></i>
                                <p>
                                    Content
                                </p>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.orders') }}"
                        class="nav-link @if (Route::is('admin.orders')) active @endif">
                        <i class="nav-icon fas fa-clipboard-check"></i>
                        <p>
                            Pesanan
                        </p>
                    </a>
                </li>
                <li class="nav-item @if (in_array(Route::currentRouteName(), ['admin.student', 'admin.mentor', 'admin.user'])) menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link @if (in_array(Route::currentRouteName(), ['admin.student', 'admin.mentor', 'admin.user'])) active @endif">
                        <i class="nav-icon fas fa-user-pen"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview"
                        @if (in_array(Route::currentRouteName(), ['admin.student', 'admin.mentor', 'admin.user'])) style="display: block" @else style="display: none" @endif>
                        <li class="nav-item">
                            <a href="{{ route('admin.student') }}"
                                class="nav-link @if (Route::is('admin.student')) active @endif">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Student
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.mentor') }}"
                                class="nav-link @if (Route::is('admin.mentor')) active @endif">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    Mentor
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user') }}"
                                class="nav-link @if (Route::is('admin.user')) active @endif">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    user
                                </p>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.settings') }}"
                        class="nav-link @if (Route::is('admin.settings')) active @endif">
                        <i class="nav-icon fa fa-wrench"></i>
                        <p>
                            Setting
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.student') }}"
                        class="nav-link {{ Route::is('admin.student') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Student
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.mentor') }}"
                        class="nav-link {{ Route::is('admin.mentor') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Mentor
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.user') }}"
                        class="nav-link {{ Route::is('admin.user') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            user
                        </p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
