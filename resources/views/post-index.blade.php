@extends('default.home')

@section('main')
    {{-- <div style="margin-left: 50px">
        <img width="300" src="http://127.0.0.1:8000/storage/{{ $post['foto'] }}" alt="{{ $post['titulo'] }}">
        <h4>{{ $post['titulo'] }}</h4>
        <p>{{ $post['descricao'] }}</p>
        <br>
        
    </div> --}}
    <div class="post">
        <div>
            <h3>{{ $post['titulo'] }}</h3>
            <img src="{{asset("storage")}}/{{ $post['foto'] }}" alt="{{ $post['nome'] }}">
            <p>Data: {{ $post['updated_at'] }}</p>
           <div class="btns">
             <a href="{{ route('post.update', $post['id']) }}">Editar</a>
            <a href="{{ route('post.delete', $post['id']) }}">Eliminar</a>
           </div>
        </div>
        <p>{{ $post['descricao'] }}</p>

    </div>
@endsection
