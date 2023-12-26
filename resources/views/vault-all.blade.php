@extends('default.home')

@section('main')
    <h3 class="what">Minhas caixas</h3>
    <table class="table cultos-list-pub">
        <thead>
            <tr>
                <th scope="col">Cofre</th>
                <th scope="col">Saldo</th>
                <th scope="col">Despositar</th>
                <th scope="col">Levantar</th>
                <th scope="col">Histórico</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vaults as $vault)
                <tr>
                    <td>{{ $vault['nome'] }}</td>
                    <td>{{ $vault['saldo'] }},00 MZN</td>
                    <td><a class="btn btn-success"
                            href="{{ route('safebox.insert', [session('user')['id'], $vault['id']]) }}">Depositar</a></td>
                    <td><a class="btn btn-primary"
                            href="{{ route('safebox.remove', [session('user')['id'], $vault['id']]) }}">Levantar</a></td>
                    <td><a class="btn btn-warning"
                            href="{{ route('safebox.history', [session('user')['id'], $vault['id']]) }}">Histórico</a></td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
