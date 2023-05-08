@extends('layouts.app')

@section('login')
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>JELE</b>APP</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">

                @if(session('error'))
                    <p class="text-danger login-box-msg">{{session('error')}}</p>
                @endif
                @if(session('success'))
                    <p class="text-success login-box-msg">{{session('success')}}</p>
                @endif
                <p class="login-box-msg">Ведите даные чтобы авторизоватся</p>
                <form action="{{route('loginPost')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Почта">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Пароль">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="row">

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Вход</button>
                        </div>

                    </div>
                </form>


{{--                <p class="mb-1">--}}
{{--                    <a href="forgot-password.html">I forgot my password</a>--}}
{{--                </p>--}}
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection
