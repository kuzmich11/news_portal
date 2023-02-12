@extends('layouts.admin')
@section('content')
    <h2>Редактирование категории</h2>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif


        <form action="{{route('admin.categories.update', ['category'=>$category])}}" method="post">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="title">Название категории</label>
                <input type="text" id="title" name="title" placeholder="Название категории" class="form-control @error('title') is-invalid @enderror"
                       value="{{ $category->title }}">
            </div>

            <div class="form-group">
                <label for="description">Описание категории</label>
                <textarea name="description" placeholder="Описание категории"
                          class="form-control @error('description') is-invalid @enderror">{!! $category->description !!}</textarea>
            </div>

            <br>
            <button type="submit" class="btn btn-success">Изменить категорию</button>
        </form>
    </div>
@endsection
