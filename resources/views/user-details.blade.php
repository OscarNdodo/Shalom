@extends('default.home')

@section('main')
    <div class="profile">
        <div class="user">
            <i class="fa fa-user-circle"></i>
            <li>
                @if ($user['cargo'] == 'admin')
                    Pastor <strong> {{ $user['nome'] }}</strong>
                @endif
                @if ($user['cargo'] == 'secretaria')
                    Secretário/a <strong> {{ $user['nome'] }}</strong>
                @endif
                @if ($user['cargo'] == 'financas')
                    Fiscal <strong> {{ $user['nome'] }}</strong>
                @endif
            </li>
            <li>Contacto: <strong> {{ $user['telefone'] }}</strong></li>
        </div>
        <h4>Anúncios</h4>
        <div class="posts">
            @if (empty($user['posts']->toArray()))
                <span class="empty">Nada ainda</span>
            @else
                @foreach ($user['posts'] as $post)
                    <div class="card">
                        <img src="{{asset("storage")}}/{{ $post['foto'] }}" height="250" width="300">
                        <p>{{ $post['titulo'] }}</p>
                        <a href="{{ route('post.show', $post['id']) }}">Mais detalhes</a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
