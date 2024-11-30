<?php

namespace Modules\BuyCoins\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Modules\BuyCoins\Models\BuyCoins;
use Modules\BuyCoins\Models\Coin;

class BuyCoinService
{
    public $model;

    public function __construct(BuyCoins $model)
    {
        $this->model = $model;
    }


    public function index()
    {
        return $this->model->paginate();
    }

    public function store(array $data)
    {

        $coin = Coin::where('id', $data['coin_id'])->first();

        if (!$coin) {
            return false;
        }
        $data['coins'] = $coin->coins;
        $data['doller'] = $coin->doller;

        $data['user_id'] = Auth::user()->id;
        User::where('id', Auth::user()->id)->update(['coins' => Auth::user()->coins + $data['coins']]);
        $BuyCoins = $this->model->create($data);
        return $BuyCoins;
    }

    public function show($id)
    {
        $BuyCoins = $this->model->findOrFail($id);
        return $BuyCoins;
    }
    public function update($id, $data)
    {
        $BuyCoins = $this->show($id);
        $data['user_id'] = Auth::user()->id;
        User::where('id', Auth::user()->id)->update(['coins' => Auth::user()->coins + $data['coins']]);
        $BuyCoins->update($data);
        return $BuyCoins;
    }

    public function destroy($id)
    {
        $BuyCoins = $this->show($id);
        $BuyCoins->delete();
    }
}



