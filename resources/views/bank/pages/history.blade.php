@extends('bank/main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>Pervesta iš</th>
            <th>Į sąskaitą</th>
            <th>Kiekis</th>
            <th>Paskirtis</th>
            <th>Data</th>
        </tr>
        </thead>
        <tbody>
        @foreach($operations as $operation)
                <tr>
                    @foreach ($users as $user)
                            <td>{{$operation->from_user_name}}</td>
                            <td>{{$operation->from_user_acc}}</td>
                            <td>{{$operation->amount}}</td>
                            <td>{{$operation->purpose}}</td>
                            <td>{{$operation->created_at}}</td>
                    @endforeach
                </tr>
        @endforeach
        </tbody>
    </table>
@stop


