<!-- Brand Logo -->
<a href="" class="brand-link">
    <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Student Dashboard</span>
</a>    <!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{Auth::user()->fullname}}</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

            </li>
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-align-justify"></i>
                    <p>
                        Academic
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('assign.course')}}" class="nav-link">
                            <i class="fa fa-baby"></i>
                            <p>Courses</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('coursework.list')}}" class="nav-link">
                            <i class="fa fa-baby-carriage"></i>
                            <p>Course Work(CW)</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('result.list')}}" class="nav-link">
                            <i class="fa fa-baby-carriage"></i>
                            <p>Semester Result(SE)</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-align-justify"></i>
                    <p>
                        Accommodation
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-address-card"></i>
                            <p>Rooms</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    @method('POST')
                </form>
            </li>
        </ul>
    </nav>

    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
