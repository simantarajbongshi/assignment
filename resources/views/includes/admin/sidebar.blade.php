<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link text-center">
        <span class="brand-text font-weight-light">Private Ltd.</span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    <x-jet-label for="username" value=" {{ Auth::user()->name }} " />
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <!-- Anchalik -->
                <li class="nav-header">NAVIGATION</li>
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link {{ (Route::is('dashboard') ? 'active' : '') }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p class="font-weight-bold">
                            Dashboard
                        </p>
                    </a>
                </li>
                <!-- Add Anchalik -->
                <li class="nav-item has-treeview">
                    <a href="#"
                        class="nav-link {{ (Route::is('addleave')  ? 'active' : '') }}">
                        <i class="fas fa-list nav-icon"></i>
                        <p class="font-weight-bold">
                            Leave
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('addleave')}}"
                                class="nav-link {{ (Route::is('addleave') ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Apply Leave</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('approvedleave')}}"
                                class="nav-link {{ (Route::is('approvedleave') ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Approved Leave</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('rejectedleave')}}"
                                class="nav-link {{ (Route::is('rejectedleave') ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rejected Leave</p>
                            </a>
                        </li>
                    </ul>
                    {{-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('approvedapplications')}}"
                                class="nav-link {{ (Route::is('approvedapplications') ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Approved Applications</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('rejectedapplications')}}"
                                class="nav-link {{ (Route::is('rejectedapplications') ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Approved Applications</p>
                            </a>
                        </li>
                    </ul> --}}
                </li>
                <!-- Daily Report -->
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
