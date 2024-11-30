<?php

namespace Modules\Statistic\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Modules\BuyCoins\Models\BuyCoins;
use Modules\Statistic\Models\Statistic;



class StatisticUserCoinService
{
    public $model;



    public function show_all()
    {
      return  BuyCoins::where('user_id', Auth::user()->id)->get();

    }
    public function total_coin()
    {
        return User::where('id', Auth::user()->id)->select('coins')->first();
    }


}
