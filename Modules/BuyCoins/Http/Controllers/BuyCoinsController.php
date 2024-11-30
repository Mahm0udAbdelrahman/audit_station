<?php

namespace Modules\BuyCoins\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\BuyCoins\Services\BuyCoinService;
use Modules\BuyCoins\Http\Requests\BuyCoins\StoreRequest;
use Modules\BuyCoins\Http\Requests\UpdateRequest;
use Modules\BuyCoins\Transformers\BuyCoinResource;

class BuyCoinsController extends Controller
{
    use HttpResponse;

    public  $buyCoin;

    public function __construct(BuyCoinService $buyCoin)
    {
        $this->buyCoin = $buyCoin;
    }

    public function index()
    {

        $data = $this->buyCoin->index();

        return $this->paginatedResponse($data, BuyCoinResource::class);
    }

    public function store(StoreRequest $request)
    {

        $buyCoin  = $request->validated();
        $data = $this->buyCoin->store($buyCoin);
        return $this->okResponse(new BuyCoinResource($data));
    }

    public function show($id)
    {
        $data = $this->buyCoin->show($id);

        return $this->okResponse(new BuyCoinResource($data));
    }
    public function update($id, UpdateRequest $request)
    {

        $validation = $request->validated();

        $data =  $this->buyCoin->update($id, $validation);

        return $this->okResponse(new BuyCoinResource($data));
    }
    public function destroy($id)
    {
        $this->buyCoin->destroy($id);

        return $this->okResponse(message: translate_success_message('expense', 'deleted'));
    }
}
