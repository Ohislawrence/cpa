<?php

namespace App\Charts;

use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class DailyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($days): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $dates = collect([]);
        $userCounts = collect([]);

        for ($i = $days - 1; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->toDateString();
            $dates->push($date);
            $userCounts->push(User::whereDate('created_at', $date)->count());
        }

        return $this->chart->lineChart()
            ->setTitle('Users Sign Up Per Day')
            ->addData('Sign Ups', $userCounts->toArray())
            ->setXAxis($dates->toArray());
    }
}
