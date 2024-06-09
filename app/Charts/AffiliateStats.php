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

    public function build($num): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $days = collect([]);
        $clickCounts = collect([]);

        for ($i = $num; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->toDateString();
            $days->push($date);
            $clickCounts->push(Click::where('user_id', Auth::user()->id)->whereDate('created_at', $date)->count());
        }

        return $this->chart->lineChart()
            ->setTitle('Users Sign Up Per Day')
            ->addData('Sign Ups', $clickCounts->toArray())
            ->setXAxis($days->toArray());
    }
}
