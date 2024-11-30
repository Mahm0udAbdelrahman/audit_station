<?php

namespace Modules\BuyCoins\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\BuyCoins\Http\Requests\StoreRequest;
use Modules\BuyCoins\Http\Requests\UpdateRequest;
use Modules\BuyCoins\Services\CoinService;
use Modules\BuyCoins\Transformers\CoinResource;

class CoinController extends Controller
{
    use HttpResponse;

    public  $coin;

    public function __construct(CoinService $coin)
    {
        $this->coin = $coin;
    }

    public function index()
    {

        $data = $this->coin->index();

        return $this->paginatedResponse($data, CoinResource::class);
    }

    public function store(StoreRequest $request)
    {

        $coin  = $request->validated();
        $data = $this->coin->store($coin);
        return $this->okResponse(new CoinResource($data));
    }

    public function show($id)
    {
        $data = $this->coin->show($id);

        return $this->okResponse(new CoinResource($data));
    }
    public function update($id, UpdateRequest $request)
    {

        $validation = $request->validated();

        $data =  $this->coin->update($id, $validation);

        return $this->okResponse(new CoinResource($data));
    }
    public function destroy($id)
    {
        $this->coin->destroy($id);

        return $this->okResponse(message: translate_success_message('expense', 'deleted'));
    }
}
