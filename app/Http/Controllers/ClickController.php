<?php

namespace App\Http\Controllers;

use App\Models\Click;
use App\Models\Country;
use App\Models\Geo;
use App\Models\Offer;
use Illuminate\Http\Request;
use Reefki\DeviceDetector\Device;
use Hibit\GeoDetect;

class ClickController extends Controller
{
    public function toOffer(Request $request)
    {

        $device = $request->device();
        $geoDetect = new GeoDetect();
        $getcountry = $geoDetect->getCountry('129.205.124.201');
       
        $country = Country::where('code', $getcountry->getIsoCode())->first();
        $offers = Offer::where('offerid', $request->offer_id )->first();
        //$geos = Geo::where('offer_id', $offers->id)->get();

        $exists = $offers->geos->where('country_id',$country->id)->isNotEmpty();

        if ($exists) {

            if ($device->isBot()) {
                $botInfo = $device->getBot();
            } else {
                $click = Click::create([
                    'user_id' => $request->aff_id,
                    'country_id'=> $country->id,
                    'device'=>$device->getBrandName(),
                    'platform' =>$device->getOs('name'),
                    'browser' =>$device->getClient('name'),
                    'status' => 'Pending',
                    'offer_id' => $request->offer_id,
                    'ip' => $request->ip(),
                    'clickID' => $this->generateUniqueCode(),
                    'referrerurl' => request()->headers->get('referer'),
                    'earned'=> 0,
                    'conversion' => 0,
                    'smartlink' => 'no',
                ]);



                    if ($device->getOs('name') == 'Android')
                    {
                        $offerURL = $offers->targets->where('target','Android')->first();

                    }elseif($device->getOs('name') == 'iOS')
                    {
                        $offerURL = $offers->targets->where('target','iOS')->first();

                    }else{
                        $offerURL = $offers->targets->where('target','Windows')->first();
                    }
                }

                return redirect()->away($offerURL->url.'?id='.$click->clickID.'&from=dealsintel');
            }else{
                return redirect()->away('https://google.com');
            }

    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(10000000, 99999999);
        } while (Click::where("clickID", "=", $code)->first());

        return $code;
    }
}
