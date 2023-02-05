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

</div>

<main class="container">
    <br>
    @yield('content')
    <br>
</main><!-- /.container -->

<footer class="blog-footer">
    <p>Новостной портал</p>
    <p>
        <a href="#">Наверх</a>
    </p>
</footer><script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>
