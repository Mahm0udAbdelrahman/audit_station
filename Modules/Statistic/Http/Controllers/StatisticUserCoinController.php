<?php

namespace Modules\Statistic\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\Statistic\Services\StatisticUserCoinService;

class StatisticUserCoinController extends Controller
{
   use HttpResponse;

    public  $StatisticCoins;

    public function __construct(StatisticUserCoinService $StatisticCoins)
    {
        $this->StatisticCoins = $StatisticCoins;
    }


    public function show_all()
    {
        $data = $this->StatisticCoins->show_all();
        return $data;
    }

    public function total_coin()
    {
        $data = $this->StatisticCoins->total_coin();
        return $data;
    }
}
