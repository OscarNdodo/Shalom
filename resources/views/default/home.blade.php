<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    {{-- Icons --}}
    <link rel="stylesheet" href="{{ asset('/icons/css/all.css') }}">
    <title>Igreja Sal Do Mundo </title>
</head>

<body>

    <header class="header">
        <nav>
            <a href="/" class="title">
                <i class="fa fa-cross"></i>
                <span>Igreja sal do Mundo </span>
            </a>
            <i id="open-menu" class="fa fa-navicon"></i>
        </nav>
        <ul id="menu">

            <a href="{{ route('home') }}">Ínicio</a>
            <a href="{{ asset('cultos') }}">Cultos</a>
            <a href="#">Link</a>

            @if (session()->has('user'))
                <div class="profile">
                    <i class="fa fa-lg fa-user-alt" id="user"><span
                            class="nome">{{ session('user')['nome'] }}</span></i>
                    <div class="options">
                        <a href="{{ route('user.profile', ['user_id' => session('user')['id']]) }}"><i
                                class="fa fa-user-circle"></i>Perfil</a>
                        <a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i>Sair</a>
                    </div>
                </div>
            @else
                <a class="btn-login" href="{{ route('login.home') }}"><i class="fa fa-sign-in"></i>Login</a>
            @endif
            <i id="close-menu" class="fa fa-close"></i>
        </ul>
    </header>
    {{-- Outros templates --}}
    @yield('main')
    {{-- Outros templates --}}


    <footer class="py-3 my-8">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link px-2 text-body-secondary">Inicio</a>
            </li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Contactos</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Duvidas</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Sobre</a></li>
        </ul>
        <p class="text-center text-body-secondary"> Igreja Sal Do Mundo &copy;{{ date('Y') }} <a href="#"
                class="marca"><i class="fa fa-code"></i>bz code</a></p>
    </footer>


    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.js') }}"></script>

</body>

</html>
