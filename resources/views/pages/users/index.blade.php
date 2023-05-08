@extends('layouts.layout')

@section('content')
    <h1>Список Пользователей</h1>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Список тех кто прошел регистрацию вТелеграмме</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">

                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                               aria-describedby="example2_info">
                            <thead>
                            <tr>
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Аватарка
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Имя
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Фамилия
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Организация
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">О себе
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Имя в телеграмме
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Ник в телеграмме
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Статус
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Модератор
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Дата регистрации
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Действие
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)

                                    <tr>
                                        <td class="dtr-control sorting_1" style="text-align: center; vertical-align: middle;" tabindex="0">{{$user->tg_user_id}}</td>
                                        <td style="text-align: center; vertical-align: middle;"><img style="height: 70px; width: 70px; object-fit: cover; " src="{{asset($user->avatar)}}" alt="{{$user->avatar}}"></td>
                                        <td style="text-align: center; vertical-align: middle;">{{$user->first_name}}</td>
                                        <td style="text-align: center; vertical-align: middle;">{{$user->last_name}}</td>
                                        <td style="text-align: center; vertical-align: middle;">{{$user->corporation}}</td>
                                        <td style="text-align: center; vertical-align: middle;">{{$user->about}}</td>
                                        <td style="text-align: center; vertical-align: middle;">{{$user->tg_first_name}}</td>
                                        <td style="text-align: center; vertical-align: middle;">{{$user->tg_username}}</td>
                                        <td style="text-align: center; vertical-align: middle;">{{$user->status}}</td>
                                        <td style="text-align: center; vertical-align: middle;">
                                        @if($user->moderator)
                                                <span class="badge badge-secondary">Модератор</span>
                                            @elseif(isset($user->moderators->status) && $user->moderators->status == 0)
                                            <span class="badge badge-secondary">Хочет стать модератором</span>
                                        @endif
                                        </td>


                                        <td style="text-align: center; vertical-align: middle;">{{$user->created_at}}</td>
                                        <td class="project-actions" style="text-align: center; vertical-align: middle;">
                                            <a class="btn btn-primary btn-xs" href="{{route('users.show', $user->id)}}">
                                                <i class="fas fa-folder">
                                                </i>&nbsp;
                                                Просмо.
                                            </a>



                                            <form action="{{route('users.destroy', $user->id)}}" method="POST" class="list-inline-item">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}

                                                <button type='submit' class="btn btn-danger btn-xs list-inline-item" >
                                                    <i class="fas fa-trash">
                                                    </i>&nbsp; Удалить</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Показано с 1  по {{$users->currentPage() * count($users->items()) }} из
                            {{$users->total()}}  записей
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

