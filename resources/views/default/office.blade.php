<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset("/css/app.css") }}">
        {{-- Icons --}}
    <link rel="stylesheet" href="{{ asset('/icons/css/all.css') }}">
    <title></title>
</head>

<body>

   <header class="header">
        <nav>
            <span class="title">
                <i class="fa fa-cross"></i>
                <span>Igreja sal do Mundo</span>
            </span>
            <i id="open-menu" class="fa fa-navicon"></i>
        </nav>
        <ul id="menu">
            <i id="close-menu" class="fa fa-close"></i>
            <a href="{{route("home")}}">Home</a>
            <a href="{{ route('post.all') }}">Novo Anúncio</a>
            <a href="#">Link</a>
            <a href="#">Link</a>
            <a href="#">Link</a>
            <a href="{{ route('logout') }}">Logout</a>
        </ul>
    </header>

    {{-- Outros templates --}}
    @yield("main")



    <footer>
        <h3>Footer cnbsa</h3>
    </footer>


    <script src="{{ asset('/js/app.js') }}"></script>

</body>

</html>
