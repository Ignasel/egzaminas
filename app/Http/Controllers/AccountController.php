<?php

namespace App\Http\Controllers;

use App\Account;
use App\Operation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\Util\Str;
use Illuminate\Auth\Access\Gate;

class AccountController extends Controller
{

    public function __construct(){

        $this->middleware('auth',[]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */





    public function admin()
    {

        $accounts = Account::all();
        $users = User::all();


        return view('bank..pages.myAcc', compact('accounts', 'users'));
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
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function showMe(Account $account)
    {
        $accounts = Account::all();
        $users = User::all();


        return view ('bank.pages.myAccount', compact('users', 'accounts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    public function createAccount()
    {
        $random = rand (1111,9999);
        $randomAcc = 'LT' . '68234567890123' . $random;
        Account::create([
            'userID' => Auth::id(),
            'accountNr' => $randomAcc,
            'attribute' => ('1'),
            'balance' => ('500'),
        ]);


        $random1 = rand (1111,9999);
        $randomAcc1 = 'LT' . '68234567890123' . $random1;
        Account::create([
            'userID' => Auth::id(),
            'accountNr' => $randomAcc1,
            'attribute' => ('0'),
            'balance' => ('0'),
        ]);

        return view('bank.main');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }


}
