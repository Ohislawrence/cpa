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

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $days = collect([]);
        $userCounts = collect([]);

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->toDateString();
            $days->push($date);
            $userCounts->push(User::whereDate('created_at', $date)->count());
        }

        return $this->chart->lineChart()
            ->setTitle('Users Sign Up Per Day')
            ->addData('Sign Ups', $userCounts->toArray())
            ->setXAxis($days->toArray());
    }
}
