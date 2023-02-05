@extends('layouts.admin')
@section('content')
    <h2>Редактировать новость</h2>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif


        <form action="{{route('admin.news.update', ['news'=>$news])}}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="category_ids">Категория</label>
                <select class="form-control @error('categories_ids') is-invalid @enderror" name="category_ids[]" id="category_ids" multiple>
                    <option value="0">--Выбрать--</option>
                    @foreach($categories as $category)
                        <option @if(in_array($category->id, $news->categories->pluck('id')->toArray()))  selected
                                @endif value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" id="title" name="title" placeholder="Название новости" class="form-control @error('title') is-invalid @enderror"
                       value="{{ $news->title }}">
            </div>

            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" id="author" name="author" placeholder="Название новости" class="form-control @error('author') is-invalid @enderror"
                       value="{{ $news->author }}">
            </div>

            <div class="form-group">
                <label for="description">Описание новости</label>
                <textarea name="description" placeholder="Описание новости"
                          class="form-control @error('description') is-invalid @enderror">{!! $news->description !!}</textarea>
            </div>

            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                    @foreach($statusList as $status)
                        <option @if($news->status === $status) selected @endif>{{ $status }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="image">Изображение</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>

            <br>
            <button type="submit" class="btn btn-success">Изменить новость</button>
        </form>
    </div>
@endsection

