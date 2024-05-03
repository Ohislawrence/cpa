<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Bavix\Wallet\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Yajra\DataTables\Contracts\DataTable;

class PaymentsController extends Controller
{
    public function transaction()
    {
        return view('admin.transactions');
    }

    public function transactiontable(Request $request)
    {
        if ($request->ajax()) {
            $data = Transaction::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="user/edit/'.$row->id.'" class="edit btn btn-success btn-sm">Edit</a>
                                    <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('date',function($row){
                    $date = Carbon::createFromFormat('Y-m-d H:i:s', $row->updated_at)->format('d/m/Y H:i');
                    return $date;
                })
                ->addColumn('amounts',function($row){
                    $amounts = '$ '.($row->amount*0.01);
                    return $amounts;
                })
                ->addColumn('payable',function($row){
                    $payable = User::find($row->payable_id)->name ;
                    return $payable;
                })
                ->rawColumns(['action','date', 'payable','amounts'])
                ->make(true);
        }
    }

    public function sendpayments()
    {
        return view('admin.sendpayments');
    }
}
