@extends('default.home')

@section('main')
    <div class="user-container">
        <ul class="actions">
            @if ($user['nivel'] == 'A')
                <a href="{{ route('post.create', [$user['id']]) }}"><i class="fa fa-flag"></i><span>Anúncio</span></a>
                <a href="{{ route('user.create') }}"><i class="fa fa-user-plus"></i><span>Usuario</span></a>
                <a href="{{ route('user.list') }}"><i class="fa fa-users"></i><span>Usuarios</span></a>
            @endif
            @if ($user['nivel'] == 'B')
                <a href="{{ route('post.create', [$user['id']]) }}"><i class="fa fa-flag"></i><span>Novo Anúncio</span></a>
                <a href="{{ route('believer.create', [$user['id']]) }}"><i class="fa fa-user-group"></i><span>Novo
                        Crente</span></a>
                <a href="{{ route('believer.all', [$user['id']]) }}"><i class="fa fa-users"></i><span>Crentes</span></a>
                <a href="{{ route('safebox.create', [$user['id']]) }}"><i class="fa fa-hand-holding-dollar"></i><span>Novo
                        cofre</span></a>
                <a href="{{ route('safebox.all', [$user['id']]) }}"><i class="fa fa-vault"></i><span>Todos cofres</span></a>
            @endif
            @if ($user['nivel'] == 'C')
                <a href="{{ route('post.create', [$user['id']]) }}"><i class="fa fa-flag"></i><span>Anúncio</span></a>
                <a href="{{ route('safebox.create', [$user['id']]) }}"><i class="fa fa-hand-holding-dollar"></i><span>Novo
                        Cofre</span></a>
                <a href="{{ route('safebox.all', [$user['id']]) }}"><i class="fa fa-vault"></i><span>Todos
                        Cofres</span></a>
            @endif
        </ul>
        {{-- <h2 class="what">Meus Anúncios</h2> --}}
        <div class="container">
            @foreach ($user['posts'] as $post)
                <div class="card">
                    <img width="300" src="{{ asset('storage') }}/{{ $post['foto'] }}" height="200" alt="">
                    <a href="{{ route('post.show', $post['id']) }}" class="title">{{ $post['titulo'] }}</a>
                    <span>Data: {{ $post['updated_at'] }}</span>
                    <a class="btn" href="{{ route('post.details', [$user['id'], $post['id']]) }}">Mais opções</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
