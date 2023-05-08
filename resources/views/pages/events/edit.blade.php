@extends('layouts.layout')

@section('content')
    <h1>Редактировать мероприятие</h1>
    <section class="content">
        <form action="{{route('events.update', $event->id)}}" method="POST">
            @method('PATCH')
            @csrf
            <div class="row">

                {{--          Форма для редактирование мероприятие     --}}
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Форма для редактирование мероприятие</h3>
                            {{--                        {{dd($event)}}--}}
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Название мероприятие</label>
                                <input type="text" id="inputName" class="form-control" name="name" value="{{$event->name}}">
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Программа мероприятие</label>

                                <textarea id="inputDescription" name="program" class="form-control" rows="10">
                                   {{$event->program}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Описание мероприятие</label>
                                <textarea id="inputDescription" name="desc" class="form-control" rows="4">
                                    {{$event->desc}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label  for="inputStatus" class="">
                                    Дата мероприятие
                                    <input
                                        type="datetime-local"
                                        name="date"
                                        class="form-control"
                                        pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}"
                                        value="{{$event->date}}"
                                    >
                                </label>
                                @error('date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputProjectLeader">Спикер Мероприятие</label>
                                <input type="text" id="inputProjectLeader" name="speakers" class="form-control"
                                       value="{{$event->speakers}}">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                {{--            Список фапйлов      --}}
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Список файлов для мероприятие</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Название файла</th>
                                    <th>Размер файла</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($event->files->toArray() as $file)
                                    <tr>
                                        <td>File name</td>
                                        <td>{{$file['path']}}</td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{$file['path']}}" class="btn btn-info"><i
                                                        class="fas fa-eye"></i></a>
                                                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputFile">Фалй <small>(pdf, pptx, jpg)</small></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" accept=".jpg,.jpeg,.bmp,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip" name="file[]"  id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Выбрать файл</label>
                                        </div>
                                        <div class="input-group-append">
{{--                                            <a href="{{route('upload_file.store')}}">Upload</a>--}}
                                            <span class="input-group-text">Загрузить файл</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            {{-- <div class="card-footer">
                                 <button type="submit" class="btn btn-primary">Submit</button>
                             </div>--}}
                        </form>

                        <!-- /.card-body -->
                    </div>

                </div>

                {{--            Список Участников      --}}
                <div class="card collapsed-card col-md-12">
                    <div class="card-header">
                        <h3 class="card-title">Участники мероприятие</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0" style="display: none;">
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th style="width: 1%">
                                    #
                                </th>
                                <th style="width: 10%">
                                    Участник ID
                                </th>
                                <th style="width: 9%">
                                    Имя
                                </th>
                                <th style="width: 10%">
                                    Участие
                                </th>
                                <th style="width: 20%">
                                    Статус
                                </th>
                                <th style="width: 50%" >
                                    Действие
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                            @php
                                $i=0;
                                $members = $event->members
                            @endphp

                            @foreach($members as $member)

                                @php

                                    $user = $member->users($member->user_id)
                                @endphp
                                <tr>
                                    <td>{{$i+=1}}</td>
                                    <td>{{$user->tg_user_id}}</td>
                                    <td>{{$user->first_name}}</td>
                                    <td>
                                        @if($member->in_person )
                                            <span class="badge bg-primary">Очно</span>
                                        @else

                                            <span class="badge bg-danger">Удалено</span>
                                        @endif
                                    </td>
                                    <td>{{$user->status}}</td>
                                    <td class="project-actions text-left">
                                        <a class="btn btn-primary btn-sm" href="{{route('users.show', 1)}}">
                                            <i class="fas fa-folder">
                                            </i>&nbsp
                                            Просмотр | Редактировать
                                        </a>
                                        <form action="{{route('events.destroy.members', ['event'=>12,'id'=>1])}}" method="POST"
                                              class="list-inline-item">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}

                                            <button type='submit' class="btn btn-danger btn-sm list-inline-item">
                                                <i class="fas fa-trash">
                                                </i>&nbspУдалить
                                            </button>
                                        </form>

                                    </td>
                                </tr>

                            @endforeach


                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->

                </div>
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Отменить</a>
                    <input type="submit" value="Сохранить изменение" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
@endsection
