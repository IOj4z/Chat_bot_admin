@extends('layouts.layout')
@section('content')
    <h1>Информация об {{$user->first_name}}</h1>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <a href="{{asset($user->avatar)}}"><img style="height: 70px; width: 70px; object-fit: cover; " class="profile-user-img img-fluid img-circle"  src="{{asset($user->avatar)}}" alt="{{$user->first_name}}"></img></a>

                            </div>
                            <h3 class="profile-username text-center">{{$user->first_name}}</h3>
                            <p class="text-muted text-center">{{$user->corporation}}</p>
                            @if($user->is_admin)
                                <p class="text-muted text-center ">Администратор</p>
                            @endif
                            @if($user->moderator)
                                <p class="text-muted text-center">Модератор</p>
                            @elseif($user->moderator == 0 && isset($mod)  && $mod->status == 0)
                               <form action="{{route('moderator', ['user_id'=>$user->id])}}" method="post">
                                   @csrf
                                   <p class="text-muted text-center">
                                       <button class="badge badge-secondary" type="submit" href="#">Хочет стать модератором</button>
                                   </p>
                               </form>
                            @endif
                            @php
                                $rejected = [];
                                $accepted = [];
                                $notAnswer= [];
                                foreach ($user->request as $item){
                                    if($item->get_response == 1){
                                        $accepted []= $item;

                                    }elseif($item->get_response == 2){
                                        $rejected[]= $item;
                                    }else{
                                        $notAnswer[] = $item;
                                    }
                                }
                            @endphp

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Приняты</b> <a class="float-right">{{count($accepted)}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Отказано</b> <a class="float-right">{{count($rejected)}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Без ответа</b> <a class="float-right">{{count($notAnswer)}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Запросы</b> <a class="float-right">{{count($user->request)}}</a>
                                </li>
                            </ul>

                            <a href="#" class="btn btn-danger btn-block"><b>Блокировать</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Анкета</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="far fa-file-alt mr-1"></i> О себе</strong>

                            <p class="text-muted">
                                {{$user->about}}
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Город</strong>

                            <p class="text-muted">{{$user->address}}</p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i>Данные Телеграмм</strong>

                            <p class="text-muted">
                                <span class="tag tag-danger">ID: {{$user->tg_user_id}}</span><br>
                                <span class="tag tag-success">Username: {{$user->tg_username}}</span><br>
                                <span class="tag tag-info">First_name: {{$user->tg_first_name}}</span>
                            </p>
                            <hr>


                            {{--<strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>--}}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
{{--                                <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Запросы</a></li>--}}
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Редактирование</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
{{--                                <div class=" active tab-pane" id="timeline">--}}
{{--                                    <!-- The timeline -->--}}
{{--                                    <div class="timeline timeline-inverse">--}}
{{--                                        <!-- timeline time label -->--}}
{{--                                        <div class="time-label">--}}
{{--                                            <span class="bg-danger">--}}
{{--                          10 Фев. 2023--}}
{{--                        </span>--}}
{{--                                        </div>--}}
{{--                                        <!-- /.timeline-label -->--}}
{{--                                        <!-- timeline item -->--}}
{{--                                        <div>--}}
{{--                                            <i class="fas fa-envelope bg-primary"></i>--}}

{{--                                            <div class="timeline-item">--}}
{{--                                                <span class="time"><i class="far fa-clock"></i> 12:05</span>--}}

{{--                                                <h3 class="timeline-header"><a href="#">{{$user->name}}</a> попросил о помощи</h3>--}}

{{--                                                <div class="timeline-body">--}}
{{--                                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,--}}
{{--                                                    weebly ning heekya handango imeem plugg dopplr jibjab, movity--}}
{{--                                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle--}}
{{--                                                    quora plaxo ideeli hulu weebly balihoo...--}}
{{--                                                </div>--}}
{{--                                                <div class="timeline-footer">--}}
{{--                                                    <a href="#" class="btn btn-primary btn-sm">Ответить</a>--}}
{{--                                                    <a href="#" class="btn btn-danger btn-sm">Удалить</a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <!-- END timeline item -->--}}
{{--                                        <!-- timeline item -->--}}
{{--                                        <div>--}}
{{--                                            <i class="fas fa-user bg-info"></i>--}}

{{--                                            <div class="timeline-item">--}}
{{--                                                <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>--}}

{{--                                                <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> принял запрос--}}
{{--                                                </h3>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <!-- END timeline item -->--}}
{{--                                        <!-- timeline item -->--}}
{{--                                        <div>--}}
{{--                                            <i class="fas fa-comments bg-warning"></i>--}}

{{--                                            <div class="timeline-item">--}}
{{--                                                <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>--}}

{{--                                                <h3 class="timeline-header"><a href="#">{{$user->name}}</a> будет принмать участья</h3>--}}

{{--                                                <div class="timeline-body">--}}
{{--                                                    Название мероприятие: Take me to your leader!--}}
{{--                                                </div>--}}
{{--                                                <div class="timeline-footer">--}}
{{--                                                    <a href="#" class="btn btn-warning btn-flat btn-sm">Отклонить</a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <!-- END timeline item -->--}}
{{--                                        <!-- timeline time label -->--}}
{{--                                        <div class="time-label">--}}
{{--                                            <span class="bg-success">--}}
{{--                          8 Фев. 2023--}}
{{--                        </span>--}}
{{--                                        </div>--}}
{{--                                        <!-- /.timeline-label -->--}}
{{--                                        <!-- timeline item -->--}}
{{--                                        <div>--}}
{{--                                            <i class="fas fa-camera bg-purple"></i>--}}

{{--                                            <div class="timeline-item">--}}
{{--                                                <span class="time"><i class="far fa-clock"></i> 2 days ago</span>--}}

{{--                                                <h3 class="timeline-header"><a href="#">{{$user->name}}</a> обновил фотограию</h3>--}}

{{--                                                <div class="timeline-body">--}}
{{--                                                    <img src="https://placehold.it/150x100" alt="...">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <!-- END timeline item -->--}}
{{--                                        <div>--}}
{{--                                            <i class="far fa-clock bg-gray"></i>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <!-- /.tab-pane -->

                                <div class="tab-pane active" id="settings">
                                    <form class="form-horizontal" method="POST" action="{{route('users.update',$user->id)}}">
                                        @method('PATCH')
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Имя</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="first_name" class="form-control" id="first_name" value="{{$user->first_name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Фамилия</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="last_name" class="form-control" id="last_name" value="{{$user->last_name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Организация</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="corporation" class="form-control" id="corporation" value="{{$user->corporation}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">О себе</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="about" id="about" placeholder="{{$user->about}}">{{$user->about}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Город</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="address" id="address" value="{{$user->address}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox"  name="moderator" class="custom-control-input"  @if($user->moderator == 1) checked @endif  id="customSwitch1">
                                                <label class="custom-control-label" for="customSwitch1">Модератор</label>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Сохранить</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->


            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection


@section('script')
    <script>
        function adModd(val, user_id) {
            fetch("https://jsonplaceholder.typicode.com/posts", {
                method: 'post',
                body: post,
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            }).then((response) => {
                return response.json()
            }).then((res) => {
                if (res.status === 201) {
                    console.log("Post successfully created!")
                }
            }).catch((error) => {
                console.log(error)
            })
        }
    </script>
@endsection
