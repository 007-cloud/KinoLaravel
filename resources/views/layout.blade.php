<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Bootstrap Kinomonster</title>

{{-- Bootstrap3 CSS --}}
<link href="/css/bootstrap.min.css" rel="stylesheet" />
{{-- Bootstrap4 CSS --}}
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}

{{-- CSS --}}
<link rel="stylesheet" href="/css/style.css" />
</head>

<body>
<div class="container-fluid">
    <div class="row">
    <nav role="navigation" class="navbar navbar-inverse">
        <div class="container">

        <div class="navber-header header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                    <h1>
                        <a href="/">Гид Онлайн</a>
                        <p>Кино - наша жизнь</p>
                    </h1>
                    </div>
                    <div class="col-lg-3 ">
                        <ul class="nav nav-pills navbar-right">
                            <!-- Authentication Links -->
                            @guest

                                    <a class="nav-link auth" href="{{ route('login') }}">{{ __('Login') }}</a> <span style="color: #fff;">/</span>

                                @if (Route::has('register'))
                                        <a class="nav-link auth" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            @else
                                <li class="active dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div id="navbarCollapse" class="collapse navbar-collapse navbar-right">
            <ul class="nav nav-pills">
            <li class="{{ Request::is('/') ? "active" : ""}}"><a href="/">Главная</a></li>
            <li class="{{ Request::is('films') ? "active" : ""}}"><a href="/films">Фильмы</a></li>
            <li class="{{ Request::is('series') ? "active" : ""}}"><a href="/series">Сериалы</a></li>
            <li class="{{ Request::is('ratings') ? "active" : ""}}"><a href="/ratings">Рейтинг фильмов</a></li>
            <li class="{{ Request::is('articles') ? "active" : ""}}"><a href="/articles">Статьи</a></li>
            <li class="{{ Request::is('contacts') ? "active" : ""}}"><a href="/contacts">Контакты</a></li>

            </ul>
        </div>

        </div>
    </nav>
    </div>
</div>

<div class="wrapper">

    <div class="container">
    <div class="row">

        <!-- Content -->
        <div class="col-lg-9  col-lg-push-3">
            <!-- SearchPanel for xs window -->
            <form role="search" class="visible-xs">
            <div class="form-group">
                <div class="input-group">
                <input type="search" class="form-control input-lg" placeholder="Ваш запрос"/>
                <div class="input-group-btn">
                    <button class="btn btn-default btn-lg" type="submit">
                    <i class="glyphicon glyphicon-search"></i>
                    </button>
                </div>
                </div>
            </div>
            </form>

            @yield('content')

        </div>
        <!-- endContent -->


        <!-- Panel -->
        <div class="col-lg-3  col-lg-pull-9">
            <!-- SearchPanel -->
            <div class="panel panel-info hidden-xs">
                <!-- SearchPanel heading -->
                <div class="panel-heading">
                <div class="sidebar-header">Поиск</div>
                </div>
                <!-- SearchPanel body -->
                <div class="panel-body">
                <form role="search">
                    <div class="form-group">
                    <div class="input-group">
                        <!-- SearchPanel input -->
                        <input type="search" class="form-control input-lg" placeholder="Ваш запрос"/>
                        <!-- SearchPanel button -->
                        <div class="input-group-btn">
                        <button class="btn btn-default btn-lg" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                        </div>
                    </div>
                    </div>
                </form>
                </div>
            </div>


            <div class="panel panel-info">
                <div class="panel-heading">
                <div class="sidebar-header">
                    Новости
                </div>
                </div>
                <div class="panel-body">
                <div class="panel panel-default">
                    <div class="panel-body">
                    <p>05.01.2020</p>
                    <p>Мы запустили новый сервис</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">
                <div class="sidebar-header">
                    Новости
                </div>
                </div>
                <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item list-group-warning">
                    <span class="badge">8.9</span>
                    <a href="#">Интерстеллар</a>
                    </li>
                    <li class="list-group-item list-group-warning">
                    <span class="badge">8.8</span>
                    <a href="#">Безумный макс</a>
                    </li>
                    <li class="list-group-item list-group-warning">
                    <span class="badge">8.8</span>
                    <a href="#">Матрица</a>
                    </li>
                    <li class="list-group-item list-group-warning">
                    <span class="badge">8.7</span>
                    <a href="#">Облачный атлас</a>
                    </li>
                    <li class="list-group-item list-group-warning">
                    <span class="badge">8.6</span>
                    <a href="#">Интерстеллар</a>
                    </li>
                    <li class="list-group-item list-group-warning">
                    <span class="badge">8.5</span>
                    <a href="#">Безумный макс</a>
                    </li>
                </ul>
                </div>
            </div>
        </div>
        <!-- endPanel -->

    </div>
    </div>
</div>
</div>

<footer>
    <div class="container">
    <p class="text-center"><a href="#">google</a></p>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
