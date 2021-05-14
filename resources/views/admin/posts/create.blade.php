@extends('admin.admin_layout')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Добавить статью
        <small>Добавить новую публикацию</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    {{Form::open(['route' => 'posts.store', 'files'=> true])}}
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Добавляем статью</h3>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Название</label>
                    <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="">
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Лицевая картинка</label>
                    <input type="file" name="image" id="exampleInputFile">

                    <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                </div>
                <div class="form-group">
                    <label>Категория</label>
{{--                    <select class="form-control select2" style="width: 100%;">--}}
{{--                        <option selected="selected">Alabama</option>--}}
{{--                        <option>Alaska</option>--}}
{{--                        <option>California</option>--}}
{{--                        <option>Delaware</option>--}}
{{--                        <option>Tennessee</option>--}}
{{--                        <option>Texas</option>--}}
{{--                        <option>Washington</option>--}}
{{--                    </select>--}}
                    {{Form::select('category_id', $categories , null, ['class' => 'form-control select2', 'style'=> 'width:100%'])}}
                </div>
                <div class="form-group">
                    <label>Теги</label>
                    <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;">
                        @foreach($tags as $key => $title)
                            <option value="{{ $key }}">{{$title}}</option>
                    @endforeach
{{--                        <option>Alabama</option>--}}
{{--                        <option>Alaska</option>--}}
{{--                        <option>California</option>--}}
{{--                        <option>Delaware</option>--}}
{{--                        <option>Tennessee</option>--}}
{{--                        <option>Texas</option>--}}
{{--                        <option>Washington</option>--}}
                    </select>
{{--                    {{Form::select('category_id', $categories , null, ['class' => 'form-control select2', 'style'=> 'width:100%'])}}--}}

                </div>
                <!-- Date -->
                <div class="form-group">
                    <label>Дата:</label>

                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="date" class="form-control pull-right" id="datepicker">
                    </div>
                    <!-- /.input group -->
                </div>

                <!-- checkbox -->
                <div class="form-group">
                    <label>
                        <input type="checkbox" class="minimal" name="is_featured">
                    </label>
                    <label>
                        Рекомендовать
                    </label>
                </div>

                <!-- checkbox -->
                <div class="form-group">
                    <label>
                        <input type="checkbox" class="minimal" name="status">
                    </label>
                    <label>
                        Черновик
                    </label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Полный текст</label>
                    <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button class="btn btn-default">Назад</button>
            <button class="btn btn-success pull-right">Добавить</button>
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
    {{Form::close()}}

</section>
<!-- /.content -->
@endsection
