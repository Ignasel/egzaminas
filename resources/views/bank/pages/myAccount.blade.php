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

    <div class="site-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 mb-5" data-aos="fade">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors -> all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="/makeTransfer" enctype="multipart/form-data" class="p-5 bg-white">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="name">Vardas</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label class="text-black" for="accNumber">Sąskaitos numeris</label>
                                <input type="text" id="accNumber" name="accNumber" class="form-control">
                            </div>
                            @foreach($accounts as $account)
                                @can('home', $account)
                                    @foreach($users as $user)
                                        @if(($user->id == $account->userID)&&($account->attribute == 1))
                                            <div class="col-md-12">
                                                <label class="text-black" for="myAcc1">Sąskaitos numeris</label>
                                                <input type="hidden" id="myAcc1" name="myAcc1" class="form-control" value="{{$account->accountNr}}">
                                            </div>
                                        @endif
                                            @if(($user->id == $account->userID)&&($account->attribute == 0))
                                                <div class="col-md-12">
                                                    <label class="text-black" for="myAcc0">Sąskaitos numeris 2</label>
                                                    <input type="hidden" id="myAcc0" name="myAcc0" class="form-control" value="{{$account->accountNr}}">
                                                </div>
                                            @endif
                                    @endforeach
                                @endcan
                            @endforeach
                            <div class="col-md-12">
                                <label class="text-black" for="amount">Suma</label>
                                <input type="number" id="amount" name="amount" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">Mokėjimo paskirtis</label>
                                <textarea class="form-control" name="purpose" id="exampleFormControlTextarea1"
                                          rows="3"></textarea>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Pervesti sau" name="submit"
                                           class="btn btn-primary py-2 px-4 text-white">
                                </div>
                            </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@stop


