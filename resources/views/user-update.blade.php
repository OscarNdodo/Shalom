@extends('default.home')

@section('main')
    <div class="form">
        <h2>Editar usuario</h2>
        <form action="{{ route('user.update', $user['id']) }}" method="post">
            @csrf
            <label for="nome">Nome</label>
            <input type="text" name="nome" placeholder="Nome do usuário..." required value="{{ $user['nome'] }}">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" placeholder="Numero de telefone do usuario..." required
                value="{{ $user['telefone'] }}">
            <label for="cargo">Cargo</label>
            <select name="cargo" required>
                <option value="admin" @if ($user['cargo'] == 'admin') selected @endif>Pastor</option>
                <option value="secretaria" @if ($user['cargo'] == 'secretaria') selected @endif>Secretário</option>
                <option value="financas" @if ($user['cargo'] == 'financas') selected @endif>Fiscal</option>
            </select>
            <label for="senha">Senha</label>
            <input type="password" name="senha" placeholder="Senha do usuário..." required value="{{ $user['senha'] }}">
            <button type="submit">Concluido</button>
        </form>
    </div>
@endsection
