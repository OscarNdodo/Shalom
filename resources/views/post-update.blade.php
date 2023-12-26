@extends('default.home')

@section('main')
    <div class="form">
        <h2>Editar Anúncio</h2>
        <form action="{{ route('post.update', $post['id']) }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" value="{{ $post['titulo'] }}" placeholder="Titulo do post..." required>
            <label for="descricao">Descricao</label>
            <textarea name="descricao" id="" cols="10" rows="5">{{ $post['descricao'] }}</textarea>
            <label for="foto">Foto</label>
            <input type="file" name="foto">
            <img src="{{asset("storage")}}/{{ $post['foto'] }}">
            <button type="submit">Concluido</button>
        </form>
    </div>
@endsection
