@extends('layouts.admin')
@section('content')
    <h2>Добавление новости</h2>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form action="{{ route('admin.news.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="category_id">Категория</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="0">--Выбрать--</option>
                    @foreach($categories as $category)
                        <option @if((int) old('category_id') === $category->id) selected
                                @endif value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" id="title" name="title" placeholder="Название новости" class="form-control"
                       value="{{old('title')}}">
            </div>

            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" id="author" name="author" placeholder="Название новости" class="form-control"
                       value="{{old('author')}}">
            </div>

            <div class="form-group">
                <label for="description">Описание новости</label>
                <textarea name="description" placeholder="Описание новости"
                          class="form-control">{{old('description')}}</textarea>
            </div>

            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    @foreach($statusList as $status)
                        <option @if(old('status') === $status) selected @endif>{{ $status }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="image">Изображение</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>

            <br>
            <button type="submit" class="btn btn-success">Добавить новость</button>
        </form>
    </div>
@endsection
