<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class PembayaranChart
{
    protected $chart1;

    public function __construct(LarapexChart $chart1)
    {
        $this->chart = $chart1;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setTitle('San Francisco vs Boston.')
            ->setSubtitle('Wins during season 2021.')
            ->addData('Boston', [7, 3, 8, 2, 6, 4])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
