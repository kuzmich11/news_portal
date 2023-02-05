@extends('layouts.admin')
@section('content')
    <h2>Добавление категории</h2>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif


        <form action="{{route('admin.categories.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Название категории</label>
                <input type="text" id="title" name="title" placeholder="Название новости" class="form-control"
                       value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label for="description">Описание категории</label>
                <textarea name="description" placeholder="Описание категории"
                          class="form-control">{{old('description')}}</textarea>
            </div>

            <br>
            <button type="submit" class="btn btn-success">Добавить категорию</button>
        </form>
    </div>
@endsection
