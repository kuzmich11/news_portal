@extends('layouts.admin')
@section('content')
    <div class="d-flex j justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h2>Список пользователей</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.users.create') }}">Добавить пользователя</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Права</th>
                <th>Имя пользователя</th>
                <th>Email</th>
                <th>Верификация Email</th>
                <th>Когда создан</th>
                <th>Когда изменен</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>@if($user->is_admin) Да @else Нет @endif</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user-> email_verified_at }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', ['user'=>$user]) }}">Изм.</a>
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

        {{ $users->links() }}
    </div>
@endsection
