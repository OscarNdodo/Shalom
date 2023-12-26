@extends('default.home')

@section('main')
    <div class="form cultos-list-pub">
        <h2>Entrada</h2>
        <form action="{{ route('safebox.insert', [$user_id, $safebox_id]) }}" method="post">
            @csrf
            <label for="valor">Valor</label>
            <input type="text" name="valor" placeholder="O valor de entrada..." required>
            <button type="submit">Concluido</button>
        </form>
    </div>
@endsection
@extends('default.home')
