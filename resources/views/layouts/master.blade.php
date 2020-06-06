<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

<!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="{{asset('css/blog.css')}}" rel="stylesheet">
</head>

<body>
<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-3 pt-1">

            </div>
            <div class="col-6 text-center">
                <a class="blog-header-logo text-dark" href="#">Module 3.6 Homework</a>
            </div>
            <div class="col-3 d-flex justify-content-end align-items-center">
            @guest
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">Login</a>
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('register') }}">Register</a>
            @endguest
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @CSRF
                    <button class="btn btn-sm btn-outline-secondary">Logout</button>
                </form>
            @endauth
            </div>
        </div>
    </header>


        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-start">
                <a class="p-2 text-muted @if (Route::currentRouteName() == 'home') active @endif" href="{{ route('home') }}">Главная</a>
                <a class="p-2 text-muted @if (Route::currentRouteName() == 'about') active @endif" href="{{ route('about') }}">О нас</a>
                <a class="p-2 text-muted @if (Route::currentRouteName() == 'contacts') active @endif" href="{{ route('contacts') }}">Контакты</a>
                <a class="p-2 text-muted @if (Route::currentRouteName() == 'posts.create') active @endif" href="{{ route('posts.create') }}">Создать статью</a>
                <a class="p-2 text-muted pull-right @if (Route::currentRouteName() == 'adminFeedbacks') active @endif" href="{{ route('adminFeedbacks') }}">Админ. Раздел</a>
            </nav>
        </div>

</div>
@if (session()->has('message'))
    @include('layouts.message')
@endif
<main role="main" class="container">
    <div class="row">
        <div class="col-md-12 blog-main">
            <h1>@yield('title')</h1>
            @yield('main')
        </div><!-- /.blog-main -->

    </div><!-- /.row -->

</main><!-- /.container -->

<footer class="blog-footer">
    <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
    <p>
        <a href="#">Back to top</a>
    </p>
</footer>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="{{asset('js/holder.min.js')}}assets/js/vendor/holder.min.js"></script>
<script>
    Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
    });
</script>
</body>
</html>

