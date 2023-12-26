@extends('default.home')

@section('main')
    <div class="form">
        <h2>Saída</h2>
        <form action="{{ route('safebox.remove', [$user_id, $safebox_id]) }}" method="post">
            @csrf
            <label for="valor">Valor</label>
            <input type="text" name="valor" placeholder="O valor de saída..." required>
            <label for="motivo">Motivo</label>
            <textarea type="text" name="motivo" placeholder="Informe qual é propósito do valor..." cols="10" rows="5" required></textarea>
            <button type="submit">Concluido</button>
        </form>
    </div>
@endsection
