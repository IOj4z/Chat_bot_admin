@extends('layouts.layout')

@section('content')
    <h1>Мероприятие: {{$event->name}}</h1>
    {{--    {{dd($event)}}--}}
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Подробное описание мероприятие</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <img style="height: 168px; object-fit: cover; "
                                             src="{{asset($event->cover)}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Дата|Время</span>
                                            <span
                                                class="info-box-number text-center text-muted mb-0">{{$event->date}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span
                                                class="info-box-text text-center text-muted">Количество участников</span>

                                            <span
                                                class="info-box-number text-center text-muted mb-0">{{$event->members->count()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-12 col-sm-4">
                                 <div class="info-box bg-light">
                                     <div class="info-box-content">
                                         <span class="info-box-text text-center text-muted">Длительность мероприятие</span>
                                         <span class="info-box-number text-center text-muted mb-0">2 часа</span>
                                     </div>
                                 </div>
                             </div>--}}
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Список участников</h3>

                                        <div class="card-tools">
                                            <ul class="pagination pagination-sm float-right">
                                                {{$event->members()->paginate()->links()}}
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th style="width: 5px">#</th>
                                                <th>Имя</th>
                                                <th>ID телеграмм</th>
                                                <th>Удалено | Очно</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $i=0;
                                                $members = $event->members
                                            @endphp

                                            @foreach($members as $member)
                                                {{--                                                $member->user_id--}}
                                                @php
                                                    $user = $member->users($member->user_id)
                                                @endphp
                                                <tr>
                                                    <td>{{$i+=1}}</td>
                                                    <td>{{$user->first_name}}</td>
                                                    <td>{{$user->tg_username}}</td>
                                                    <td>
                                                        @if($member->in_person )
                                                            <span class="badge bg-primary">Очно</span>
                                                        @else

                                                            <span class="badge bg-danger">Удалено</span>
                                                        @endif
                                                    </td>
                                                </tr>

                                            @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <h3 class="text-primary"><i class="far fa-file-alt"></i>&nbspПрограмма мероприятие</h3>
                        <p class="text-muted">{{$event->desc}}</p>
                        <br>
                        <h3 class="text-primary"><i class="far fa-file-alt"></i>&nbspОписание мероприятие</h3>
                        <p class="text-muted">{{$event->program}}</p>
                        <br>
                        <div class="text-muted">
                            <h5 class="mt-2 text-muted">Спикер мероприятие</h5>
                            @if (count($event->speakers) > 0 !== null)
                              @foreach($event->speakers as $item)
                                    <b class="d-block">{{$item->name}}</b>
                              @endforeach
                            @else
                                <b class="d-block"><small>Пока не назначен</small></b>
                            @endif
                        </div>
                        <h5 class="mt-5 text-muted">Файлы мероприятие</h5>
                        <ul class="list-unstyled">
                            @if($event->files->count() > 0)
                                @foreach($event->files->toArray() as $file)
                                    <li>
                                        <a href="{{$file['path']}}" class="btn-link text-secondary"><i
                                                class="far fa-fw fa-file-word"></i>
                                            {{$file['path']}} </a>
                                    </li>
                                @endforeach
                            @else
                                <li class="text-muted">
                                    <b class="d-block"><small>Файлов пока нет</small></b>
                                </li>
                            @endif
                            {{--<li>
                                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                            </li>
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.jpeg</a>
                            </li>
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                            </li>
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.pptx</a>
                            </li>--}}
                        </ul>
                        <div class="text-center mt-5 mb-3">
                            <a href="{{route('events.index')}}" class="btn btn-sm btn-primary">Вернутся</a>
                            <a href="{{route('events.edit',$event->id)}}"
                               class="btn btn-sm btn-warning">Редактировать</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
