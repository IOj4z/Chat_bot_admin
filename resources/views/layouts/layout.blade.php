@include('includes.head')
<div class="wrapper">

    <!-- Preloader -->
{{--    <div class="preloader flex-column justify-content-center align-items-center">--}}
{{--        <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">--}}
{{--    </div>--}}

        @include('includes.navbar')

    @include('includes.left_side_bar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                   {{-- <div class="col-sm-6">
--}}{{--                        <h1 class="m-0">Dashboard</h1>--}}{{--
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->--}}
                    <div class="col-sm-6">

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
        @include('includes.main')
    </div>

@include('includes.footer')
