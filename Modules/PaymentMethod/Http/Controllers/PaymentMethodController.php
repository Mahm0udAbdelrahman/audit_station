<?php

namespace Modules\PaymentMethod\Http\Controllers;

use App\Helpers\ApiResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\PaymentMethod\Http\Requests\StoreRequest;
use Modules\PaymentMethod\Http\Requests\UpdateRequest;
use Modules\PaymentMethod\Services\PaymentMethodService;
use Modules\PaymentMethod\Transformers\PaymentMethodResource;

class PaymentMethodController extends Controller
{
    use HttpResponse;
    public $PaymentMethod;
    public function __construct(PaymentMethodService $PaymentMethod)
    {
        $this->PaymentMethod = $PaymentMethod;
    }

    public function index()
    {

        $data = $this->PaymentMethod->index();
          return $this->paginatedResponse($data, PaymentMethodResource::class);
    }

    public function store(StoreRequest $request)
    {
        $validation = $request->validated();
        $data = $this->PaymentMethod->store($validation);

        return $this->okResponse(new PaymentMethodResource($data));
    }

    public function show($id)
    {
        $data = $this->PaymentMethod->show($id);
        return $this->okResponse(new PaymentMethodResource($data));
    }

    public function update($id, UpdateRequest $request)
    {
        $validation = $request->validated();

        $data =  $this->PaymentMethod->update($id, $validation);

        return $this->okResponse(new PaymentMethodResource($data));
    }

    public function destroy($id)
    {
        $this->PaymentMethod->destroy($id);

        return response()->json(['message' => 'PaymentMethod deleted successfully']);
    }
}
