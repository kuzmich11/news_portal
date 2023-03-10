<!doctype html>
<html lang="ru" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow"><link rel="canonical" href="https://bootstrap5.ru/examples/blog" />

    <title>Новостной портал</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/docs.css') }}">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/blog.css')}}" rel="stylesheet">
</head>

<body>
<div class="container">
    <x-header></x-header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            @foreach ($categories as $c)
            <a class="p-2 @if(isset($id) and $id === $c->id) link-primary @else link-secondary @endif" href="{{route('category.show', ['id'=>$c->id])}}">{{$c->title}}</a>
            @endforeach
        </nav>
    </div>
</div>

<main class="container">
    <br>
    @yield('content')

</main><!-- /.container -->

<footer class="blog-footer">
    <p>Новостной портал</p>
    <p>
        <a href="#">Наверх</a>
    </p>
</footer><script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>
