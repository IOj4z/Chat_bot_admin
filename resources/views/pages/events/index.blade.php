@extends('layouts.layout')

@section('content')
    <h1>Список всех мероприятий</h1>
    <div class="card">
        <div class="card-header">
{{--            <h3 class="card-title">DataTable with minimal features &amp; hover style</h3>--}}
            <div class="card-footer clearfix">

                <button type="button" class="btn btn-primary float-right"><a class="btn btn-primary btn-sm" href="{{route('events.create')}}">
                        <i class="fas fa-plus"></i>&nbsp
                         Создать
                    </a></button>
            </div>
        </div>
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
                                    aria-label="Rendering engine: activate to sort column descending">Номер
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Обложка
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Название
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Количество участников
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Дата проведения
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Действие
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($events as $event)
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0" style="text-align: center; vertical-align: middle;">{{ $event->id }}</td>
                                    <td style="text-align: center; vertical-align: middle;"><img style="height: 70px; width: 70px; object-fit: cover; " src="{{asset($event->cover)}}" alt=""> </td>
                                    <td style="text-align: center; vertical-align: middle;">{{ $event->name }}</td>
                                    <td style="text-align: center; vertical-align: middle;">  <span class="badge badge-secondary">{{ count($event->members )}}</span></td>
                                    <td style="text-align: center; vertical-align: middle;">{{$event->date}}</td>
                                    <td class="list-inline" style="text-align: center; vertical-align: middle;">
                                        <a class="btn btn-primary btn-sm list-inline-item" href="{{route('events.show',  $event->id)}}">
                                            <i class="fas fa-folder">
                                            </i>&nbsp;
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm list-inline-item" href="{{route('events.edit',  $event->id)}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>&nbsp;
                                            Edit
                                        </a>
                                        <form action="{{route('events.destroy', $event->id)}}" method="POST" class="list-inline-item">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}

                                            <button type='submit' class="btn btn-danger btn-sm list-inline-item" >
                                                <i class="fas fa-trash">
                                                </i>&nbsp;Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Показано с 1  по {{count($events->items())}} из
                            {{$events->total()}}  записей
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $events->links() !!}
                    </div>
{{--                    {{dd($events->links())}}
     <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="example2_previous"><a
                                        href="#" aria-controls="example2" data-dt-idx="0" tabindex="0"
                                        class="page-link">Предыдущая</a></li>
                                <li class="paginate_button page-item active"><a href="#" aria-controls="example2"
                                                                                data-dt-idx="1" tabindex="0"
                                                                                class="page-link">1</a></li>
                                <li class="paginate_button page-item next" id="example2_next"><a href="#"
                                                                                                 aria-controls="example2"
                                                                                                 data-dt-idx="7"
                                                                                                 tabindex="0"
                                                                                                 class="page-link">Следующая</a>
                                </li>
                            </ul>
                        </div>
                    </div>
--}}

                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
