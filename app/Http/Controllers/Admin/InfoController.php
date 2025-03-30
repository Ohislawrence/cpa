<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;
use Yajra\DataTables\Contracts\DataTable;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Info::select(['id', 'info_type', 'information', 'updated_at']);
            
            return Datatables::of($data)
                ->addColumn('updatedAT', function ($row) {
                    return Carbon::parse($row->updated_at)->format('d/m/Y');
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.info.edit', $row->id);
                    $deleteBtn = '<button onclick="hapus('.$row->id.')" class="btn btn-danger btn-sm">Delete</button>';
                    return '<a href="'.$editUrl.'" class="btn btn-primary btn-sm">Edit</a> ' . $deleteBtn;
                })
                ->addColumn('infos', function($row){
                    $info = Str::limit($row->information, 50);
                    return  strip_tags($info);
                })
                ->rawColumns(['action','infos','updatedAT'])
                ->make(true);
        }
    
        return view('admin.info.view');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.info.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'info_type' => 'required|string|max:255',
            'information' => 'required|string',
        ]);

        Info::create([
            'info_type' => $request->info_type,
            'slug' => Str::slug($request->info_type), // Generate slug automatically
            'information' => $request->information,
        ]);

        return redirect()->route('info.index')->with('message', 'Information created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $info = Info::findOrFail($id);
        return view('admin.info.edit', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'info_type' => 'required|string|max:255',
            'information' => 'required|string',
        ]);

        $info = Info::findOrFail($id);
        $info->update([
            'info_type' => $request->info_type,
            'slug' => Str::slug($request->info_type), // Update slug on edit
            'information' => $request->information,
        ]);

        return redirect()->route('admin.info.index')->with('message', 'Information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $info = Info::findOrFail($id);
        $info->delete();

        return redirect()->route('info.index')->with('message', 'Information deleted successfully.');
    }
}
