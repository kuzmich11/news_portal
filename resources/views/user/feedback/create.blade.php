@extends('layouts.user')
@section('content')
    <h2>Добавление новости</h2>
    <form action="{{route('user.feedback.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Имя пользователя</label>
            <input name="name" placeholder="Имя пользователя" class="form-control" value="{{old('name')}}">
        </div>

        <div class="form-group">
            <label for="comments">Комментарий</label>
            <textarea name="comments" placeholder="Коментарий" class="form-control">{{old('comments')}}</textarea><br>
        </div>

        <button type="submit" class="btn btn-success">Отправить отзыв</button>
    </form>
@endsection
