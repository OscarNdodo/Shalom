@extends('default.home')


@section('main')
    <div class="post">
        <div>
            <h3>{{ $post['titulo'] }}</h3>
            <img src="{{asset("storage")}}/{{ $post['foto'] }}" alt="{{ $post['nome'] }}">
        </div>
        <p>{{ $post['descricao'] }}</p>
    </div>
@endsection
