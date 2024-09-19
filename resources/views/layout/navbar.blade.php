<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Web Conselho de Classe</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/logoifba.png') }}">
</head>
<body>
    <header>
        <nav class="navbar">
          <div class="logo">
            <img src="{{ asset('img/IFBA_MARCA.png') }}" alt="Logo IFBA"> 
            <h3>Web Conselho de Classe</h3>
         </div>
            <ul class="nav-menu">
                <li class="nav-item"><a href="{{ route('Home') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('avaliar') }}" class="nav-link">Avaliar</a></li>
                <li class="nav-item"><a href="{{ route('Sobre') }}" class="nav-link">Sobre</a></li>
                @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
                @else
                <li class="nav-item">
                    <div class="dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="/administrador" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-content">
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>
            @endguest
            </ul>
            <div class="hamburguer">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>
<script src="{{ asset('js/navbar.js') }}"></script>
    @yield('content')
</body>
</html>