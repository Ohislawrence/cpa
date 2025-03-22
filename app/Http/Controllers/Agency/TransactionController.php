<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use Bavix\Wallet\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;

class TransactionController extends Controller
{
    public function index()
    {

        return view('agency.unpaidcommissions');
    }

    public function getusertransaction(Request $request)
    {
        if ($request->ajax()) {
            $data = Transaction::where('payable_id')->latest()->get();
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
