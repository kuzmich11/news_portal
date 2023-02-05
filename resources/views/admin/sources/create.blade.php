@extends('layouts.admin')
@section('content')
    <h2>Добавление задачи на выгрузку данных</h2>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form action="{{ route('admin.sources.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="resource_name">Название ресурса</label>
                <input type="text" id="resource_name" name="resource_name" placeholder="Название ресурса" class="form-control @error('resource_name') is-invalid @enderror"
                       value="{{old('resource_name')}}">
            </div>

            <div class="form-group">
                <label for="resource_url">Адрес ресурса</label>
                <input type="text" id="resource_url" name="resource_url" placeholder="Адрес ресурса" class="form-control @error('resource_url') is-invalid @enderror"
                       value="{{old('resource_url')}}">
            </div>

            <div class="form-group">
                <label for="news_title">Название новости</label>
                <input type="text" id="news_title" name="news_title" placeholder="Название новости" class="form-control @error('news_title') is-invalid @enderror"
                       value="{{old('news_title')}}">
            </div>

            <br>
            <button type="submit" class="btn btn-success">Добавить задачу</button>
        </form>
    </div>
@endsection
