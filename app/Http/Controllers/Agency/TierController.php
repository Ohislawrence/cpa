<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Models\Tier;
use Illuminate\Http\Request;
use DataTables;

class TierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tier =  Tier::latest()->paginate(10);
        return view('agency.tier.view', compact('tier'));
    }

    public function table(Request $request)
    {
        if ($request->ajax()) {
            $data = Tier::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="edit/'.$row->id.'" class="edit btn btn-primary btn-sm">Edit</a>
                    <a href="" class="edit btn btn-warning btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'level' => 'required|string|max:255',
            'commission_rate' => 'nullable|numeric',
            'min_sales' => 'required|numeric|min:0',
        ]);

        Tier::create($validated);

        return redirect()->back()
            ->with('message', 'Tier created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tier = Tier::findorfail($id);
        return view('agency.tier.edit', compact('tier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'level' => 'required|string|max:255',
            'commission_rate' => 'nullable|numeric',
            'min_sales' => 'required|numeric|min:0',
        ], [
            'min_sales.min' => 'Minimum sales cannot be negative',
        ]);

        $tier = Tier::findorfail($id);
        $tier->update($validated);

        return redirect()->back()
            ->with('message', 'Tier updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tier = Tier::findorfail($id);
        $tier->delete();
        return redirect()->back()
            ->with('message', 'Tier deleted successfully.');
    }
}
