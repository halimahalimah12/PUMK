<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Data_mitra;
class KabupatenChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $chart= Data_Mitra::get();

        return $this->chart->pieChart()
            ->setTitle('Jumlah Persebaran Mitra Berdasrkan Wilayah')
            ->setWidth(450)
            ->addData([
                \App\Models\Data_mitra::where('kab','=','btghari')->count(),
                \App\Models\Data_mitra::where('kab','=','majambi')->count(),
                \App\Models\Data_mitra::where('kab','=','bungo')->count(),
                \App\Models\Data_mitra::where('kab','=','tebo')->count(),
                \App\Models\Data_mitra::where('kab','=','tanjabtim')->count(),
                \App\Models\Data_mitra::where('kab','=','tanjabar')->count(),
                \App\Models\Data_mitra::where('kab','=','merangin')->count(),
                \App\Models\Data_mitra::where('kab','=','sarolangun')->count(),
                \App\Models\Data_mitra::where('kab','=','spenuh')->count(),
                \App\Models\Data_mitra::where('kab','=','kotajambi')->count(),
                \App\Models\Data_mitra::where('kab','=','kerinci')->count(),
            ])
            ->setLabels([
                            'Batanghari',
                            'Ma.Jambi',
                            'Bungo',
                            'Tebo',
                            'Tanjabtim',
                            'Tanjabar',
                            'Merangin',
                            'Sarolangun',
                            'S.Penuh',
                            'Kota Jambi',
                            'Kerinci'   ]);
    }
}
