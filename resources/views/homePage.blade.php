@extends('layouts.main')
@section('content')
    <div class="row mb-2">
        @forelse($news as $n)
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h2 class="mb-0">
                            <a class="text-dark" href="{{route('news.show', ['id'=>$n->id])}}">{{$n->title}}</a></h2>
                        <div class="mb-1 text-muted">{{$n->created_at}}</div>
                        <p class="card-text mb-auto">{{$n->description}}</p>
                        <a href="{{route('news.show', ['id'=>$n->id])}}" class="stretched-link">Продолжить чтение</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Thumbnail" preserveaspectratio="xMidYMid slice" role="img" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    </div>
                </div>
            </div>
        @empty
            <h2>Новостей нет</h2>
        @endforelse
    </div>
@endsection
