@extends('default.home')

@section('main')
    <div class="">
        <h2 class="what">Entradas</h2>
        <table class="table cultos-list-pub">
            <thead>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Valor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($history['enters'] as $enter)
                    <tr>
                        <td>{{ $enter['created_at'] }}</td>
                        <td>{{ $enter['valor'] }},00 MZN</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <hr>
        <h2 class="what">Saidas</h2>
        <table class="table cultos-list-pub">
            <thead>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Motivo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($history['exits'] as $exit)
                    <tr>
                        <td>{{ $exit['created_at'] }}</td>
                        <td>{{ $exit['valor'] }},00 MZN</td>
                        <td>{{ $exit['motivo'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-danger culto-pdf cultos-list-pub"><i class="fa fa-file-pdf"></i>Baixar Relatorio</button>
    </div>
@endsection
