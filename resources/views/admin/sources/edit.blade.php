@extends('layouts.admin')
@section('content')
    <h2>Изменение задачи на выгрузку данных</h2>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form action="{{ route('admin.sources.update', ['source'=>$source]) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="resource_name">Название ресурса</label>
                <input type="text" id="resource_name" name="resource_name" placeholder="Название ресурса" class="form-control @error('resource_name') is-invalid @enderror"
                       value="{{ $source->resource_name }}">
            </div>

            <div class="form-group">
                <label for="resource_url">Адрес ресурса</label>
                <input type="text" id="resource_url" name="resource_url" placeholder="Адрес ресурса" class="form-control @error('resource_url') is-invalid @enderror"
                       value="{{ $source->resource_url }}">
            </div>

            <br>
            <button type="submit" class="btn btn-success">Изменить задачу</button>
        </form>
    </div>
@endsection
