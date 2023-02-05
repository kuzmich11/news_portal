@extends('layouts.admin')
@section('content')
    <div class="d-flex j justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h2>Список новостей</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.news.create') }}">Добавить новость</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Категория</th>
                    <th>Название</th>
                    <th>Автор</th>
                    <th>Описание</th>
                    <th>Статус</th>
                    <th>Когда создана</th>
                    <th>Когда изменена</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
            @forelse($newsList as $news)
            <tr>
                <td>{{ $news->id }}</td>
                <td>{{ $news->categories->map(fn($item) => $item->title)->implode(', ') }}</td>
                <td>{{ $news->title }}</td>
                <td>{{ $news->author }}</td>
                <td>{{ $news->description }}</td>
                <td>{{ $news-> status }}</td>
                <td>{{ $news->created_at }}</td>
                <td>{{ $news->updated_at }}</td>
                <td>
                    <a href="{{ route('admin.news.edit', ['news'=>$news]) }}">Изм.</a>
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

        {{ $newsList->links() }}
    </div>
@endsection
