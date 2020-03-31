@extends('bank/main')

@section('content')
    <table class="table">
        <thead>
        <tr>
        <th>Vardas Pavardė</th>
        <th>Sąskaitos numeris</th>
        <th>Sąskaitos likutis</th>
        </tr>
        </thead>
        <tbody>
        @foreach($accounts as $account)
            @can('home', $account)
                <tr>
                    @foreach ($users as $user)
                        @if ($account->userID == $user->id)
                            <td>{{$user->name}}</td>
                            <td>{{$account->accountNr}}</td>
                            <td>{{$account->balance}}</td>
                        @endif
                    @endforeach
                </tr>
            @endcan
        @endforeach
        </tbody>
    </table>
@stop


