<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">

        <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="{{route('home_page')}}">Новостной портал</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
            @if(Auth::user())
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('account.logout') }}">Выйти</a>
            @else
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">Войти</a>
            @endif
        </div>
    </div>
</header>
