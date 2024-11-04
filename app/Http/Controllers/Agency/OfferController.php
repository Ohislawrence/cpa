<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Country;
use App\Models\Geo;
use App\Models\Offer;
use App\Models\Payout;
use App\Models\Target;
use App\Models\User;
use Illuminate\Support\Str;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Contracts\DataTable;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::latest()->get();
        //$timeframe = 7;
        return view('agency.offers',compact('offers'));
    }

    public function getStats(Request $request)
{
    $dateRange = $request->input('dateRange');
    $query =  DB::table('offers')
                ->join('clicks', 'offers.offerid', '=', 'clicks.offer_id')
                ->where('offers.status', 'Active'); //Offer::with('click');
    

    if ($dateRange === 'today') {
        $query->whereDate('created_at', Carbon::today());
    } elseif ($dateRange === '7_days_ago') {
        $query->where('created_at', '>=', Carbon::now()->subDays(7));
    } elseif ($dateRange === '30_days_ago') {
        $query->where('created_at', '>=', Carbon::now()->subDays(30));
    } elseif ($dateRange === 'this_month') {
        $query->where('created_at', '>=', Carbon::now()->startOfMonth());
    }
    // No date filter for "all_time"

    /**$data = $query->first()->map(function ($offer) {
        return [
            'ActiveCampaigns' => $offer->count(),
            'clicks' => $offer->click->id ?? 0, // Total number of clicks for this order
            'clicks' => $offer->click->id ?? 0, // Total number of clicks for this order
            'Conversions' => $offer->click->id ?? 0,
        ];
    });
    **/
    
    $data = $query->selectRaw('COUNT(distinct offers.id) as ActiveCampaigns, COUNT(clicks.offer_id) as clicks, SUM(clicks.conversion) as Conversions')
       ->first();

    return response()->json($data);
}

    public function create()
    {
        $categories = Category::latest()->get();
        $locations = Country::all();
        $payouts = Payout::all();
        return view('agency.newcampaigns', compact( 'categories', 'locations', 'payouts'));
    }

    public function viewcampaign(Request $request)
    {
        if ($request->ajax()) {
            $data = Offer::latest()->get();
            return Datatables::of($data)

                ->addColumn('action', function($row){
                    $actionBtn = '<a href="campaign/details/'.$row->id.'/view" class="edit btn btn-primary btn-sm">View</a>';
                    return $actionBtn;
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
                ->addColumn('payouttype', function($row){
                     $payouttype = $row->payouttype->name;
                    return $payouttype;
                })
                ->rawColumns(['action','category', 'payout', 'payouttype'])
                ->make(true);
        }
    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(100000, 999999);
        } while (Offer::where("offerid", "=", $code)->first());

        return $code;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
        ]);

        $imageName = Str::slug($request->name).time().'.'.$request->image->extension();

        $request->image->move(public_path('images/offer'), $imageName);

        $offer = Offer::create([
            'user_id' => auth()->user()->id,
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



        return back()->with('message','Campaigns Created');
    }

    public function campaigndetails(string $id)
    {
        $offer = Offer::find($id);
        return view('agency.campaignview', compact('offer'));
    }

    public function campaignstats(string $id)
    {
        $offer = Offer::find($id);
        return view('agency.campaignstat', compact('offer'));
    }

}
