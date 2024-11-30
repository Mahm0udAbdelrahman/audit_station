<?php

namespace Modules\Cart\Http\Controllers;

use App\Helpers\ApiResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\Cart\Http\Requests\StoreRequest;
use Modules\Cart\Services\CartService;
use Modules\Cart\Transformers\CartResource;
use Modules\Course\Transformers\CourseResource;

class CartController extends Controller
{
    use HttpResponse;
    public $Cart;
    public function __construct(CartService $Cart)
    {
        $this->Cart = $Cart;
    }

    public function index()
    {

        $data = $this->Cart->index();
         return $this->resourceResponse($data, CartResource::class);
     }

    public function store(StoreRequest $request)
    {
        $validation = $request->validated();
        $data = $this->Cart->store($validation);

        return $this->okResponse(new CartResource($data));
    }

    public function destroy($id)
    {
         $this->Cart->destroy($id);
        return $this->okResponse(message: translate_success_message('cart', 'deleted'));
    }

    public function deleteAll()
    {
        $this->Cart->deleteAll();
        return $this->okResponse(message: translate_success_message('cart', 'deleted all cart'));
    }
}
