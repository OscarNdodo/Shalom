@extends('default.home')

@section('main')
    <table class="table cultos-list-pub">
        <thead>
            <tr class="bg-primary text-white">
                <th scope="col">Dia da semana</th>
                <th scope="col">Culto</th>
                <th scope="col">Horas</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-primary" scope="col">Domingo</td>
                <td>Culto comum</td>
                <td>07:30</td>
            </tr>
            <tr>
                <td class="text-primary" scope="col">Segunda-Feira</td>
                <td>Culto dos Intermediarios</td>
                <td>17:30</td>
            </tr>
            <tr>
                <td class="text-primary" scope="col">Terca-Feira</td>
                <td>Culto dos Jovens</td>
                <td>17:30</td>
            </tr>
            <tr>
                <td class="text-primary" scope="col">Quarta-Feira</td>
                <td>Culto geral de oracao</td>
                <td>04:00</td>
            </tr>
            <tr>
                <td class="text-primary" scope="col">Quarta-Feira</td>
                <td>Culto comum</td>
                <td>18:00</td>
            </tr>
            <tr>
                <td class="text-primary" scope="col">Quinta-Feira</td>
                <td>Culto das Maes</td>
                <td>15:00</td>
            </tr>
            <tr>
                <td class="text-primary" scope="col">Sexta-Feira</td>
                <td>Culto de milagres e curas</td>
                <td>18:00</td>
            </tr>
            <tr>
                <td class="text-primary" scope="col">Sabado</td>
                <td>Ensaio dos dominicais</td>
                <td>07:00</td>
            </tr>
            <tr>
                <td class="text-primary" scope="col">Sabado</td>
                <td>Ensaio Intermediarios</td>
                <td>14:00</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
@endsection
