@extends('layouts.layout')

@section('content')
        <h1>Новое мероприятие</h1>
        <form action="{{route('events.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Форма для заполнение мероприятие</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-2" for="exampleInputFile">Обложка <small>(jpg,png)</small></label>
                                <div class="col-5 text-center">
                                    <div id="preview" >

                                    </div>
                                </div>
                                <div class="col-5">

                                    <div class="custom-file">
                                        <input
                                            type="file"
                                            name="cover"
                                            id="cover"
                                            class="custom-file-input" >
                                        <label class="custom-file-label" for="customFile">Выбрать файл</label>
                                        <div>
                                            @error('cover')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Название мероприятие</label>
                                <input type="text"  id="inputName" name="name"  @error('name') is-invalid @enderror  class="form-control" placeholder="Название">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Программа мероприятия</label>
                                <textarea id="inputDescription"  name="desc" class="form-control" @error('desc') is-invalid @enderror  rows="4" placeholder="Программа мероприятия"></textarea>
                                @error('desc')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Описание мероприятие</label>
                                <textarea id="inputDescription"  name="program"  @error('program') is-invalid @enderror class="form-control" rows="4" placeholder="Описание мероприятия"></textarea>
                                @error('program')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Дата мероприятие</label>
                                <label>
                                    <input
                                        type="datetime-local"
                                        name="date"
                                        class="form-control"
                                        pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}"
                                    >
                                </label>
                                @error('date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group" id="speakers">
                                <label for="inputProjectLeader">Спикер Мероприятие</label>
                                <input type="text" id="speakers"  name="speakers[]" @error('speaker') is-invalid @enderror  class="form-control speakers " hidden placeholder="Спикер">

                                @error('speaker')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="controls">
                                <a href="#" id="add_more_fields"><i class="fa fa-plus"></i>Добавить поле</a>
                                <a href="#" id="remove_fields"><i class="fa fa-plus"></i>Удалить поле</a>
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

                        <form  name="uploadForm">
                            <div class="card-body">
                                <div class="form-group">
                                    <!-- <label for="customFile">Custom File</label> -->
                                    <label for="exampleInputFile">Фалй <small>(pdf, pptx, jpg)</small></label>
                                    <div class="custom-file">
                                        <input
                                            type="file"
                                            name="file[]"
                                            id="file"
                                            multiple
                                            class="custom-file-input" >
                                        <label class="custom-file-label" for="customFile">Выбрать файл</label>
                                        <div>
                                            @error('file')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <label for="fileNum">Выбрано файлов:</label>
                                        <output id="fileNum">0</output>;
                                        <label for="fileSize">Общий размер:</label>
                                        <output id="fileSize">0</output>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Отменить</a>
                    @csrf
                       <input type="submit" name="submit" value="Создать" class="btn btn-success">

                </div>
            </div>
        </section>
        </form>
@endsection


@section('script')


@endsection
