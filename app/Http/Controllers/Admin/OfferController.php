<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Geo;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Payout;
use App\Models\Target;
use App\Models\User;
use Illuminate\Support\Str;
use DataTables;
use Yajra\DataTables\Contracts\DataTable;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = Offer::latest()->get();
        
        return view('admin.offer', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::latest()->get();
        $users= User::role('agency')->get();
        $agencies = $users;
        $locations = Country::all();
        $payouts = Payout::all();
        return view('admin.components.addoffermodal', compact( 'categories', 'agencies', 'locations', 'payouts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
        ]);

        $imageName = Str::slug($request->name).time().'.'.$request->image->extension();

        $request->image->move(public_path('images/offer'), $imageName);

        $offer = Offer::create([
            'user_id' => $request->owner,
            'image' => $imageName,
            'status' => $request->status,
            'offerid' => $this->generateUniqueCode(),
            'name' => $request->name,
            'category_id' => $request->category,
            'payout_id' => $request->payout,
            'actionurl' => $request->actionurl,
            'desc' => $request->desc,
        ]);

        foreach($request->location as $key => $lo )
        {
            Geo::create([
                'offer_id'=> $offer->id,
                'country_id'=>$lo,
            ]);
        }


        Target::insert([
            ['offer_id' => $offer->id,
            'target' => 'Windows',
            'payout' => ($request->desktop) ? $request->desktop : "0",
            'url' => ($request->desktopurl) ? $request->desktopurl : null],
            ['offer_id' => $offer->id,
            'target' => 'iOS',
            'payout' => ($request->ios) ? $request->ios : "0",
            'url' => ($request->iosurl) ? $request->iosurl : null],
            ['offer_id' => $offer->id,
            'target' => 'Android',
            'payout' => ($request->andriod) ? $request->andriod : "0",
            'url' => ($request->iosurl) ? $request->iosurl : null]
        ]);



        return back()->with('message','Offer Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $offer = Offer::find($id);
        return view('admin.viewoffer', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(100000, 999999);
        } while (Offer::where("offerid", "=", $code)->first());

        return $code;
    }

    public function viewtable(Request $request)
    {
        if ($request->ajax()) {
            $data = Offer::latest()->get();
            return Datatables::of($data)

                ->addColumn('action', function($row){
                    $actionBtn = '<a href="offers/'.$row->id.'" class="edit btn btn-primary btn-sm">View</a>';
                    return $actionBtn;
                })
                ->addColumn('owner', function($row){
                    $owner = $row->user->name;
                    return $owner;
                })
                ->addColumn('category', function($row){
                    $category = $row->category->name;
                    return $category;
                })
                ->addColumn('targetting', function($row){
                    foreach($row->targets as $tar)
                    {
                        $targetting = $tar->target;
                        $tarrs[] = $targetting;
                    }
                    return $tarrs;

                })
                ->addColumn('payout', function($row){
                    foreach($row->targets as $tar)
                    {
                        $payout = $tar->payout;
                        $payys[] = $payout;
                    }
                    return '$'.round(array_sum($payys)/count($payys),2);
                })
                ->addColumn('geos', function($row){
                    foreach($row->geos as $tar)
                    {
                        $geoss = $tar->country->code;
                        $ge[] = $geoss;
                    }
                    return $ge;
                })
                ->addColumn('payouttype', function($row){
                     $payouttype = $row->payouttype->name;
                    return $payouttype;
                })
                ->rawColumns(['action','category','targetting', 'payout', 'payouttype', 'geos', 'owner'])
                ->make(true);
        }
    }

    public function ailink()
    {
        return view('admin.ailink');
    }
}
