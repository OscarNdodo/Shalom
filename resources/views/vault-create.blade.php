@extends("default.home")

@section("main")
<div class="form">
    <h2>Novo Cofre</h2>
    <form action="{{route("safebox.create", $user_id)}}" method="post">
        @csrf
        <label for="nome">Nome do cofre</label>
        <input type="text" name="nome" placeholder="ex: caixa de jovens" required>
        <button type="submit">Criar</button>
    </form>
</div>
@endsection