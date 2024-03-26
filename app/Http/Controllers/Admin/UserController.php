<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Yajra\DataTables\Contracts\DataTable;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }


    public function store(Request $request) {

        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:Users,email',
            'password' => 'required|string'
        ]);
        
        $user = User::create($validated);
        $user->assignRole($request->role);
    
        //return view('partials.todo-item', compact('user'));
        return back()->with('message','User Created');
    }

    public function getusers(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a> <a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function viewuser($id)
    {
        $user = User::where('id', $id)->first();

        return view('admin.viewuser', compact('user'));
    }
}
