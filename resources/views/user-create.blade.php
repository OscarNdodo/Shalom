@extends('default.home')

@section('main')
    <div class="form">
        <h2>Novo usuario</h2>
        <form action="{{ route('user.create') }}" method="post">
            @csrf
            <label for="nome">Nome</label>
            <input type="text" name="nome" placeholder="Nome do usuário..." required>
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" placeholder="Numero de telefone do usuario..." required>
            <label for="cargo">Cargo</label>
            <select name="cargo" required>
                <option value="null">Selecione uma opção</option>
                <option value="admin">Pastor</option>
                <option value="secretaria">Secretário</option>
                <option value="financas">Fiscal</option>
            </select>
            <label for="senha">Senha</label>
            <input type="password" name="senha" placeholder="Senha do usuário..." required>
            <button type="submit">Concluido</button>
        </form>
    </div>
@endsection
