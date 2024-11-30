<?php

namespace Modules\BuyCoins\Services;

use Modules\BuyCoins\Models\Coin;

class CoinService
{
    public $model;

    public function __construct(Coin $model)
    {
        $this->model = $model;
    }


    public function index()
    {
        return $this->model->paginate();
    }

    public function store(array $data)
    {

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
        $BuyCoins->update($data);
        return $BuyCoins;
    }

    public function destroy($id)
    {
        $BuyCoins = $this->show($id);

        $BuyCoins->delete();
    }
}
