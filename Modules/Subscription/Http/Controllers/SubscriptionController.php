<?php

namespace Modules\Subscription\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;

use Modules\Subscription\Services\SubscriptionService;
use Modules\Subscription\Transformers\SubscriptionResource;
use Modules\Subscription\Http\Requests\Subscription\UpdateRequest;
use Modules\Subscription\Http\Requests\Subscription\StoreRequest;


class SubscriptionController extends Controller
{
    use HttpResponse;

    public  $item;

    public function __construct(SubscriptionService $item)
    {
        $this->item = $item;
    }

    public function index()
    {

        $data = $this->item->index();

        return $this->paginatedResponse($data, SubscriptionResource::class);
    }

    public function store(StoreRequest $request)
    {

        $ContactUs  = $request->validated();
        $data = $this->item->store($ContactUs);

        return $this->okResponse(new SubscriptionResource($data));
    }

    public function show($id)
    {
        $data = $this->item->show($id);

        return $this->okResponse(new SubscriptionResource($data));
    }
    public function update($id, UpdateRequest $request)
    {

        $validation = $request->validated();

        $data =  $this->item->update($id, $validation);

        return $this->okResponse(new SubscriptionResource($data));
    }
    public function destroy($id)
    {
        $this->item->destroy($id);

        return $this->okResponse(message: translate_success_message('expense', 'deleted'));
    }
}


