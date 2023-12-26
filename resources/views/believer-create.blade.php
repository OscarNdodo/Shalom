@extends('default.home')

@section('main')
    <div class="form">
        <h2>Novo crente</h2>
        <form action="{{route("believer.create", $user_id)}}" method="post">
            @csrf
            <label for="nome">Nome</label>
            <input type="text" name="nome" placeholder="Digite o nome completo" required>
            <label for="genero">Gênero</label>
            <select name="genero" required>
                <option value="null">Selecione o gênero</option>
                <option value="M">Mascúlino</option>
                <option value="F">Femenino</option>
            </select>
            <label for="data_nascimento">Data de nascimento</label>
            <input type="date" name="data_nascimento">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" placeholder="Cidade, Bairro" required>
            <label for="batizado">Batizado</label>
            <select name="batizado" required>
                <option value="null">Selecione uma opção</option>
                <option value="1">Sim</option>
                <option value="0">Nao</option>
            </select>
            <label for="cargo">Cargo</label>
            <input type="text" name="cargo" placeholder="A função dentro da igreja...">
            <label for="contacto">Contacto</label>
            <input type="number" name="contacto" placeholder="Número de telefone...">
            <button type="submit">Salvar</button>
        </form>
    </div>
@endsection
