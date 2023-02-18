@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-8">
        <h2 class="blog-post-title">{{$news->title}}</h2>
        <p class="blog-post-meta">{{$news->created_at}}<a href="#"> ({{$news->author}}) </a></p>
        <div class="blog-post">
            @if($news->image !== null)
                <img src="{{ Storage::disk('public')->url($n->image) }}" style="width: 200px; height: 250px">
            @endif

            <p>{!! $news->description !!}</p>
            <hr>
        </div>
    </div>

    <aside class="col-md-4">
        <div class="p-4 mb-3 bg-light rounded">
            <h4 class="font-italic">О блоге</h4>
            <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
        </div>
        <div class="p-4">
            <h4 class="font-italic">Архивы</h4>
            <ol class="list-unstyled mb-0">
                <li><a href="#">Март 2014</a></li>
                <li><a href="#">Февраль 2014</a></li>
                <li><a href="#">Январь 2014</a></li>
                <li><a href="#">Декабрь 2013</a></li>
                <li><a href="#">Ноябрь 2013</a></li>
                <li><a href="#">Октябрь 2013</a></li>
                <li><a href="#">Сентябрь 2013</a></li>
                <li><a href="#">Август 2013</a></li>
                <li><a href="#">Июль 2013</a></li>
                <li><a href="#">Июнь 2013</a></li>
                <li><a href="#">Май 2013</a></li>
                <li><a href="#">Апрель 2013</a></li>
            </ol>
        </div>
    </aside>
</div><!-- /.row -->
@endsection
