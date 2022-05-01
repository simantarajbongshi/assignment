<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('superadmin.dashboard')}}" class="brand-link text-center">
        <span class="brand-text font-weight-light">Wellcome</span>
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
                <!-- Navigation -->
                <li class="nav-header">NAVIGATION</li>
                <li class="nav-item">
                    <a href="{{route('superadmin.dashboard')}}" class="nav-link {{ (Route::is('dashboard') ? 'active' : '') }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p class="font-weight-bold">
                            Dashboard
                        </p>
                    </a>
                </li>
                <!-- Booth view -->
                <li class="nav-item has-treeview">
                    <a href="#"
                        class="nav-link {{ (Route::is('appliedleave') ? 'active' : '') }}">
                        <i class="fas fa-list nav-icon"></i>
                        <p class="font-weight-bold">
                            Applications
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('appliedleave')}}"
                                class="nav-link {{ (Route::is('appliedleave')  ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Applied Leave</p>
                            </a>
                        </li>
                    </ul>
                    {{-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('pastapplications')}}"
                                class="nav-link {{ (Route::is('pastapplications')  ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Past Applications</p>
                            </a>
                        </li>
                    </ul> --}}
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('pastapplications')}}"
                                class="nav-link {{ (Route::is('pastapplications')  ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Approved Applications</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('pastapplicationsrejected')}}"
                                class="nav-link {{ (Route::is('pastapplicationsrejected')  ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rejected Applications</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Check details -->
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
