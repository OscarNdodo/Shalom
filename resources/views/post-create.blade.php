@extends("default.home")

@section("main")
<div class="form">
    <h2>Novo Anúncio</h2>
    <form action="{{route("post.create", $user_id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="titulo">Título</label>
        <input type="text" name="titulo" placeholder="Título do post..." required>
        <label for="descricao">Descrição</label>
        <textarea name="descricao" id="" cols="10" placeholder="Escreva aqui a menssagem do anúncio..." rows="5"></textarea>
        <label for="foto">Foto</label>
        <input type="file" name="foto">
        <button type="submit">Criar</button>
    </form>
</div>
@endsection