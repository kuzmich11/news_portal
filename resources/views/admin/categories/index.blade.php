@extends('layouts.admin')
@section('content')
    <div class="d-flex j justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h2>Список категорий</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.categories.create') }}">Добавить категорию</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Название категории</th>
                <th>Описание</th>
                <th>Когда создана</th>
                <th>Когда изменена</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{!! $category->description !!}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', ['category'=>$category]) }}">Изм.</a>
                        <a href="{{''}}">Уд.</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Записей нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
