@extends('layouts.admin')
@section('content')
    <h2>Все новости</h2>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Название</th>
                    <th>Автор</th>
                    <th>Описание</th>
                    <th>Статус</th>
                    <th>Когда создана</th>
                    <th>Когда изменена</th>
                </tr>
            </thead>
            <tbody>
            @forelse($newsList as $news)
            <tr>
                <td>{{ $news->id }}</td>
                <td>{{ $news->title }}</td>
                <td>{{ $news->author }}</td>
                <td>{{ $news->description }}</td>
                <td>{{ $news-> status }}</td>
                <td>{{ $news->created_at }}</td>
                <td>{{ $news->updated_at }}</td>
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
