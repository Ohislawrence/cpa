<?php

namespace App\Http\Controllers;

use App\Models\Click;
use App\Models\Offer;
use Illuminate\Http\Request;
use Reefki\DeviceDetector\Device;

class ClickController extends Controller
{
    public function toOffer(Request $request)
    {

        $device = $request->device();

        //dd($offerURL);

        if ($device->isBot()) {
            $botInfo = $device->getBot();
        } else {
            $click = Click::create([
                'user_id' => $request->aff_id,
                'country_id'=>1,
                'device'=>$device->getBrandName(),
                'platform' =>$device->getOs('name'),
                'browser' =>$device->getClient('name'),
                'status' => 'Pending',
                'offer_id' => $request->offer_id,
                'ip' => $request->ip(),
                'clickID' => $this->generateUniqueCode(),
                'referrerurl' => request()->headers->get('referer'),
            ]);



                if ($device->getOs('name') == 'Android')
                {
                    $offers = Offer::where('offerid', $request->offer_id )->first();
                    $offerURL = $offers->targets->where('target','Android')->first();
                    //$offerURL = $offer1->url;

                }elseif($device->getOs('name') == 'iOS')
                {
                    $offers = Offer::where('offerid', $request->offer_id )->first();
                    $offerURL = $offers->targets->where('target','iOS')->first();
                    //dd($offerURL->url);
                    //$offerURL = $offer1->url;

                }else
                {
                    $offers = Offer::where('offerid', $request->offer_id )->first();
                    $offerURL = $offers->targets->where('target','Windows')->first();
                    //$offerURL = $offer1->url;
                }
            }

            return redirect()->away($offerURL->url.'?id='.$click->clickID.'&from=dealsintel');

    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(10000000, 99999999);
        } while (Click::where("clickID", "=", $code)->first());

        return $code;
    }
}
