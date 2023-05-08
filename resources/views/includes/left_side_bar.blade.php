<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset(auth()->user()->avatar)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('users.show',auth()->user()->id)}}" class="d-block">  {{auth()->user()->first_name}}</a>
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
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

{{--                <li class="nav-header">EXAMPLES</li>--}}
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Статистика
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('events.index')}}" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Мероприятия
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('members.index')}}" class="nav-link">--}}
{{--                        <i class="nav-icon fa fa-id-card"></i>--}}
{{--                        <p>--}}
{{--                            Участники--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="nav-item">
                    <a href="{{route('networking.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Нетворкинг
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p>
                            Пользователи
                        </p>
                    </a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('speakers.index')}}" class="nav-link">--}}
{{--                        <i class="nav-icon fa fa-bullhorn"></i>--}}
{{--                        <p>--}}
{{--                            Спикеры--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('requests.index')}}" class="nav-link">--}}
{{--                        <i class="fa fa-compress nav-icon" aria-hidden="true"></i>--}}
{{--                        <p>--}}
{{--                            Запросы--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
