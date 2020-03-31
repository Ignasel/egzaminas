<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $fillable = ['from_user_name', 'from_user_acc', 'to_user_name', 'to_user_acc', 'amount', 'purpose'];
}

