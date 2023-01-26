@extends('layouts.admin')
@section('content')
    <h2>Добавление новости</h2>
    <form action="{{route('admin.news.store')}}" method="post">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        @csrf
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input name="title" placeholder="Название новости" class="form-control" value="{{old('title')}}">
        </div>

        <div class="form-group">
            <label for="description">Описание новости</label>
            <textarea name="description" placeholder="Описание новости" class="form-control">{{old('description')}}</textarea><br>
        </div>

        <br>
        <button type="submit" class="btn btn-success">Добавить новость</button>
    </form>
@endsection
