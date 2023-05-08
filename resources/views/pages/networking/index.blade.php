@extends('layouts.layout')

@section('content')
    <h1>Список запросов между участников</h1>
    <div class="card">
{{--        <div class="card-header">--}}
{{--            <h3 class="card-title">DataTable with minimal features &amp; hover style</h3>--}}
{{--        </div>--}}
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                               aria-describedby="example2_info">
                            <thead>
                            <tr>
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">Запрос был от
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Состояние запроса
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Ответ от
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Состояние ответа
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Дата запроса
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Дата ответа
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Действие
                                </th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($requests as $request)

                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0">Имя: {{$request->users->first_name}} |  Телеграмм: {{$request->users->tg_first_name}}</td>
                                    <td>
                                        @if ($request->send_request)
                                            Выполнен
                                        @else
                                            Чтото не так
                                        @endif
                                    </td>
                                    <td>Имя: {{$request->searchUsers->first_name}} |  Телеграмм: {{$request->searchUsers->tg_first_name}}</td>
                                    <td>
                                        @if ($request->get_response == 1)
                                            Общаются
                                        @elseif($request->get_response == 2)
                                            Отказано
                                        @elseif($request->get_response == 0)
                                            Ответа не было
                                        @else
                                            Чтото не так
                                        @endif
                                    </td>
                                    <td>{{$request->created_at}}</td>
                                    <td>{{$request->updated_at}}</td>
                                    <td class="project-actions " style="text-align: center; vertical-align: middle;">
                                        <a class="btn btn-primary btn-sm" href="{{route('users.show', $request->users->id)}}">
                                            <i class="fas fa-folder">
                                            </i>&nbsp;
                                            Просмо.
                                        </a>
                                        <form action="#" method="POST" class="list-inline-item">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}

                                            <button type='submit' class="btn btn-danger btn-sm list-inline-item" >
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
                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Показано с 1  по {{count($requests->items())}} из
                            {{$requests->total()}}  записей
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $requests->links() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
