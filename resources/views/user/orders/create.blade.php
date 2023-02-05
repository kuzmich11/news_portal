@extends('layouts.user')
@section('content')
    <h2>Добавление новости</h2>
    <form action="{{route('user.orders.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="userName">Имя пользователя</label>
            <input name="userName" placeholder="Имя пользователя" class="form-control" value="{{old('userName')}}">
        </div>

        <div class="form-group">
            <label for="phone">Номер телефона</label>
            <input name="phone" placeholder="+79990000000" class="form-control" value="{{old('phone')}}">
        </div>

        <div class="form-group">
            <label for="mail">"Эл. почта"</label>
            <input name="mail" placeholder="Эл. почта" class="form-control" value="{{old('mail')}}">
        </div>

        <div class="form-group">
            <label for="description">Информация о заказе</label>
            <textarea name="description" placeholder="Информация о заказе" class="form-control">{{old('description')}}</textarea><br>
        </div>

        <button type="submit" class="btn btn-success">Отправить запрос</button>
    </form>
@endsection

