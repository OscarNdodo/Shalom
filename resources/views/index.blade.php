@extends('default.home')

@section('login')
@endsection

@section('main')

    <section class="start">
        <form class="form-search" method="POST" action="{{ route('post.all') }}">
            @csrf
            <input type="search" name="search" placeholder="Pesquisar aqui...">
            <button type="submit" class="fa fa-search"></button>
        </form>
    </section>
    <p class="what">Anúncios</p>
    <section class="container">
        @if (!empty($posts))
            @foreach ($posts as $post)
                @if ($post['user']['status'] == 1)
                    <div class="card">
                        <img src="{{ asset('storage') }}/{{ $post['foto'] }}" alt="{{ $post['titulo'] }}">
                        <a href="{{ route('post.show', $post['id']) }}" class="title">{{ $post['titulo'] }}</a>
                        <span class="vocation">
                            <i class="fa fa-user-circle"></i>
                            @if ($post['user']['cargo'] == 'admin')
                                Pastor <a
                                    href="{{ route('user.details', $post['user']['id']) }}">{{ $post['user']['nome'] }}</a>
                            @endif
                            @if ($post['user']['cargo'] == 'secretaria')
                                Secretário/a <a
                                    href="{{ route('user.details', $post['user']['id']) }}">{{ $post['user']['nome'] }}</a>
                            @endif
                            @if ($post['user']['cargo'] == 'financas')
                                Fiscal <a
                                    href="{{ route('user.details', $post['user']['id']) }}">{{ $post['user']['nome'] }}</a>
                            @endif
                            <i class="fa fa-clock-rotate-left"></i>
                            @php
                                $postedDate = strtotime($post['updated_at']);
                                $currentDate = strtotime(now());
                                $liftTime = $currentDate - $postedDate;

                                $segunds = $liftTime;
                                $minuts = round($liftTime / 60);
                                $hours = round($liftTime / 3600);
                                $days = round($liftTime / 86400);
                                $weeks = round($liftTime / 604800);
                                $mounths = round($liftTime / 2419200);
                                $years = round($liftTime / 29030400);

                                if ($segunds < 60) {
                                    echo 'Agora';
                                } elseif ($minuts < 60) {
                                    echo $minuts == 1 ? 'Há um minuto' : "Há $minuts minutos";
                                } elseif ($hours < 24) {
                                    echo $hours <= 1 ? 'Há uma hora' : "Há $hours horas";
                                } elseif ($days < 7) {
                                    echo $days <= 1 ? 'Há um dia' : "Há $days dias";
                                } elseif ($weeks < 4) {
                                    echo $weeks <= 1 ? 'Há uma semana' : "Há $weeks semanas";
                                } elseif ($mounths < 12) {
                                    echo $mounths <= 1 ? 'Há um mês' : "Há $mounths meses";
                                } else {
                                    echo $years <= 1 ? 'Há um ano' : "Há $years anos";
                                }
                            @endphp
                        </span>
                        <p class="description">{{ $post['descricao'] }}</p>
                    </div>
                @else
                    {{-- <span>Nada para mostrar ainda...!</span> --}}
                @endif
            @endforeach
        @else
            <div class="empty-project">
                <img src="{{ asset('storage') }}/capa/noproject.jpg" alt="">
                <span>Não há nada para mostrar ainda!</span>
            </div>
        @endif
    </section>
@endsection
