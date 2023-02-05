@extends('layouts.admin')
@section('content')
    <div class="d-flex j justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h2>Заказы на выгрузку данных</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.sources.create') }}">Добавить заказ</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Название ресурса</th>
                <th>Адрес ресурса</th>
                <th>Название новости</th>
                <th>Когда создана</th>
                <th>Когда изменена</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($sources as $source)
                <tr>
                    <td>{{ $source->id }}</td>
                    <td>{{ $source->resource_name }}</td>
                    <td>{{ $source->resource_url }}</td>
                    <td>{{ $source->news_title }}</td>
                    <td>{{ $source->created_at }}</td>
                    <td>{{ $source->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.sources.edit', ['source'=>$source]) }}">Изм.</a>
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

        {{ $sources->links() }}
    </div>
@endsection
