<?php

namespace App\Charts;

use App\Models\Click;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AffiliateStats
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $days = CarbonPeriod::create(now()->subDay(7), now());
        $daycs =[];
            foreach ($days as $day) {
                $daycs[] = $day->format('d-m-Y');
            }

        $clicks = Click::where('user_id', Auth::user()->id)->groupBy(DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y')"))->orderBy('created_at')->get();
        //dd($clicks->clickID);
        foreach($clicks as $click)
        {
            
            $cl[] = $click->count();
        }
        
        return $this->chart->lineChart()
            ->setTitle('Sales during 2021.')
            ->setSubtitle('Physical sales vs Digital sales.')
            ->addData('Clicks', $cl)
            //->addData('Digital sales', [70, 29, 77, 28, 55, 45])
            ->setXAxis($daycs);
    }
}
