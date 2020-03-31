<?php

namespace App\Http\Controllers;

use App\Account;
use App\Operation;
use App\User;
use Illuminate\Http\Request;

class OperationController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth', []);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function history()
    {
        $operations = Operation::all();
        $users = User::all();

        return view ('bank.pages.history', compact('users', 'operations'));
    }

    public function new_transfer()
    {
        $accounts = Account::all();
        $users = User::all();
        return view ('bank.pages.transfer', compact('accounts', 'users'));
    }

    public function makeTransfer(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'accNumber' => 'required',
            'purpose' => 'required',
            'amount' => 'required'

        ]);

        $accounts = Account::all();

        $operation = Operation::create([
            'from_user_name' => request('myName'),
            'from_user_acc' => request('myAcc'),
            'to_user_name' => request('name'),
            'to_user_acc' => request('accNumber'),
            'amount' => request('amount'),
            'purpose' => request('purpose'),
        ]);



        return redirect('/history');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function show(Operation $operation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function edit(Operation $operation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operation $operation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operation $operation)
    {
        //
    }
}
