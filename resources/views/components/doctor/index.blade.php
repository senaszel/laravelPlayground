<link rel="stylesheet" href="{{ asset('css/workSchedule.css') }}">

<table>
    <tr>
        <th> DATA </th>
        <th> LICZBA CHĘTNYCH DO SZCZEPIENIA</th>
    </tr>
@foreach($allPatients as $patient)
    <tr>
        <td> {{ $patient->DATE_VACCINATION }}</td>
        <td> {{ $patient->HOW_MANY }}</td>
    </tr>
@endforeach
</table>
