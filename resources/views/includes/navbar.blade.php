<!-- Navbar -->

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Главная</a>
        </li>

    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            @auth
                <a href="{{ route('logout') }}" class="btn btn-outline-light me-2">Выйти</a>
            @endauth
        </li>
    </ul>

{{--    @include('includes.rigth_navbar')--}}
</nav>
<!-- /.navbar -->
