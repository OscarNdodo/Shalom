@extends('default.home')

@section('main')
    <h2 class="what">Crentes</h2>
    @if (!empty($believers->toArray()))
        <table class="table cultos-list-pub ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Endereco</th>
                    <th scope="col">Batizado</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Contacto</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($believers as $believer)
                    <tr>
                        <td>{{ $believer['id'] }}</td>
                        <td>{{ $believer['nome'] }}</td>
                        <td>{{ $believer['endereco'] }}</td>
                        <td>

                            @if ($believer['batizado'])
                                Sim
                            @else
                                Nao
                            @endif

                        </td>
                        <td>{{ $believer['cargo'] }}</td>
                        <td>{{ $believer['contacto'] }}</td>
                        <td><a href="#" class="fa fa-lg fa-pencil-square"></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="empty-project">
            <img width="500" src="http://127.0.0.1:8000/storage/capa/noproject.jpg" alt="">
            <span>Não há nada para mostrar ainda!</span>
        </div>
    @endif
    </section>
@endsection
