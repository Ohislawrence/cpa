<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function creditdebit(Request $request)
    {
        //dd($request->userID);
        $amount = $request->amount;
        $user = User::find($request->userID);
        if($request->creditdebit == 'credit')
        {
            $user->depositFloat($amount);
        }elseif($request->creditdebit == 'debit')
        {
            $user->withdrawFloat($amount);
        }

        return back()->with('message', 'User wallet has been updated!');

    }

    public function paymentrequests($id)
    {
        $user = User::find($id);
        return view('admin.paymentrequest', compact('user'));
    }

    public function transactionuser($id)
    {
        $user = User::find($id);
        return view('admin.transactionuser', compact('user'));
    }
}
