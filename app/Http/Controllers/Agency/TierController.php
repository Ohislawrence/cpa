<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Models\Tier;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tier =  Tier::latest()->paginate(10);
        $lastEvaluated = DB::table('agencydetails')
        ->where('user_id', auth()->id())
        ->value('last_tier_evaluation_at');
        return view('agency.tier.view', compact('tier','lastEvaluated'));
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

    public function evaluate(Request $request)
    {
        $merchant = auth()->user();

        if (!$merchant->hasRole('merchant')) {
            abort(403, 'Unauthorized');
        }
    
        if (!settings()->get('allowed_affiliate_tier')) {
            return back()->with('error', 'Affiliate tier evaluation is not enabled.');
        }
    
        $affiliates = User::role('affiliate')
            ->with(['clicks', 'affiliatedetails'])
            ->get();
    
        $changes = 0;
    
        foreach ($affiliates as $affiliate) {
            $totalConversions = $affiliate->clicks()->sum('conversion');
    
            $newTier = Tier::where('min_sales', '<=', $totalConversions)
                ->orderByDesc('min_sales')
                ->first();
    
            if ($newTier && optional($affiliate->affiliatedetails)->tier_id !== $newTier->id) {
                $affiliate->affiliatedetails?->update([
                    'tier_id' => $newTier->id,
                ]);
                $changes++;
            }
        }
    
        // Save evaluation date in the agencydetails table
        DB::table('agencydetails')->where('user_id', $merchant->id)->update([
            'last_tier_evaluation_at' => now(),
        ]);
    
        $message = $changes > 0
            ? "Evaluation complete. {$changes} affiliates had their tier updated."
            : "Evaluation complete. No changes were made.";
    
        return back()->with('message', $message);    }
}
