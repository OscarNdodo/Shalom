@extends("default.home")


@section("main")
<div class="login">
    <h1>Login</h1>
    <form action="{{route("login")}}" method="POST">
        @csrf
        <label for="telefone">Telefone</label>
        <input type="number" name="telefone" placeholder="Seu número de telefone">
        <label for="senha">Senha</label>
        <input type="password" name="senha" placeholder="Sua senha de usuário">
        <button type="submit">Entrar</button>
    </form>
</div>
@endsection