@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ route('index') }}">Plotter</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('catalog') }}">Работы</a>
                </li>
                @auth()
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Кабинет автора
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('myIdeas') }}">Мои идеи</a>
                        <a class="dropdown-item" href="{{ route('myBooks') }}">Мои книги</a>
                    </div>
                </li>
                @endauth
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Личный кабинет
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @guest()
                        <a class="dropdown-item" href="{{ route('login') }}">Вход</a>
                        <a class="dropdown-item" href="{{ route('register') }}">Регистрация</a>
                        @endguest
                        @auth()
                        {{--<a class="dropdown-item" href="#">Профиль</a>--}}
                        <a class="dropdown-item" href="{{ route('logout') }}">Выход</a>
                        @endauth
                    </div>
                </li>
            </ul>
        </div>
    </nav>
