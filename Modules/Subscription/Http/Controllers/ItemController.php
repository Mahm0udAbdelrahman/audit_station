<?php

namespace Modules\Subscription\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\Subscription\Http\Requests\Item\StoreRequest;

use Modules\Subscription\Services\ItemService;
use Modules\Subscription\Transformers\ItemResource;

class ItemController extends Controller
{
    use HttpResponse;

    public  $item;

    public function __construct(ItemService $item)
    {
        $this->item = $item;
    }

    public function index()
    {

        $data = $this->item->index();

        return $this->paginatedResponse($data, ItemResource::class);
    }

    public function store(StoreRequest $request)
    {

        $item  = $request->validated();
        $data = $this->item->store($item);
        return $this->okResponse(new ItemResource($data));
    }

    public function show($id)
    {
        $data = $this->item->show($id);

        return $this->okResponse(new ItemResource($data));
    }
    public function update($id, StoreRequest $request)
    {

        $validation = $request->validated();

        $data =  $this->item->update($id, $validation);

        return $this->okResponse(new ItemResource($data));
    }
    public function destroy($id)
    {
        $this->item->destroy($id);

        return $this->okResponse(message: translate_success_message('expense', 'deleted'));
    }
}
