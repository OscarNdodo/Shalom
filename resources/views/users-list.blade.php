@extends('default.home')

@section('main')

    <div class="container-users">
        @foreach ($users as $user)
        <div class="card-user">
            {{-- @if ($user['nivel'] != 'A') --}}
                    <i class="fa fa-user-circle"></i>
                    <li>{{ $user['nome'] }}</li>
                    <li>{{ $user['telefone'] }}</li>
                    <li>
                        @switch($user["cargo"])
                            @case('admin')
                                Pastor
                            @break

                            @case('secretaria')
                                Secretário/a
                            @break

                            @default
                                Fiscal
                        @endswitch
                    </li>
                    <div class="btns">

                        <a href="{{ route('user.update', $user['id']) }}">Editar</a>
                        <a href="{{ route('user.lock', $user['id']) }}">
                            @if ($user['status'] == '1')
                                Bloquear
                            @else
                                Activar
                            @endif
                        </a>
                        <a href="{{ route('user.details', $user['id']) }}">Anúncios</a>
                    </div>
            {{-- @endif --}}
    </div>
    @endforeach
    </div>
@endsection
