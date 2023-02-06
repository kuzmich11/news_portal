@extends('layouts.admin')
@section('content')
    <h2>Редактировать данные пользователя</h2>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif


        <form action="{{route('admin.users.update', ['user'=>$user])}}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="is_admin">Права администратора</label>
                <select class="form-control" name="is_admin" id="is_admin">
                    @foreach([true, false] as $status)
                        <option @if($user->is_admin === $status) selected
                                @endif value="@if($status) 1 @else 0 @endif">@if($status) Да @else Нет @endif</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Имя пользователя</label>
                <input type="text" id="name" name="name" placeholder="Имя пользователя"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label for="email">Email адрес</label>
                <input type="text" id="email" name="email" placeholder="Email адрес"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ $user->email }}">
            </div>

            <div class="form-group">
                <label for="email_verified_at">Верификация Email</label>
                <select class="form-control" name="email_verified_at" id="email_verified_at">
                    <option value="Нет">Нет</option>
                    <option value="Да">Да</option>
                </select>
            </div>

            <br>
            <button type="submit" class="btn btn-success">Изменить данные пользователя</button>
        </form>
    </div>
@endsection


