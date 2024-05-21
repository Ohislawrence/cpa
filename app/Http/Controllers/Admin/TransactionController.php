<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Requestpayment;
use App\Models\User;
use Bavix\Wallet\Models\Transaction;
use Illuminate\Http\Request;
use DataTables;
use Yajra\DataTables\Contracts\DataTable;
use Carbon\Carbon;

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

    public function agencytransaction($id)
    {
        $user = User::find($id);
        return view('admin.agencyprofile.transactions', compact('user'));
    }

    public function getpaymentrequest(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = Requestpayment::where('user_id', $id)->latest()->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="" class="edit btn btn-primary btn-sm">View</a>';
                    return $actionBtn;
                })
                ->addColumn('date', function($row){
                    $date = Carbon::createFromFormat('Y-m-d H:i:s', $row->updated_at)->format('d/m/Y');
                    return $date;
                })
                ->rawColumns(['action','date'])
                ->make(true);
        }
    }

    public function getusertransaction(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = Transaction::where('payable_id', $id)->latest()->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="" class="edit btn btn-primary btn-sm">View</a>';
                    return $actionBtn;
                })
                ->addColumn('date', function($row){
                    $date = Carbon::createFromFormat('Y-m-d H:i:s', $row->updated_at)->format('d/m/Y');
                    return $date;
                })
                ->addColumn('amounts', function($row){
                    $amounts = number_format($row->amount/100, 2) ;
                    return $amounts;
                })
                ->rawColumns(['action','date','amounts'])
                ->make(true);
        }
    }
}
