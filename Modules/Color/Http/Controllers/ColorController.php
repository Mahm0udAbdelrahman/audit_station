<?php

namespace Modules\Color\Http\Controllers;

use App\Helpers\ApiResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\Color\Http\Requests\StoreRequest;
use Modules\Color\Http\Requests\UpdateRequest;
use Modules\Color\Services\ColorService;
use Modules\Color\Transformers\ColorResource;

class ColorController extends Controller
{
    use HttpResponse;
    public $color;
    public function __construct(ColorService $color)
    {
        $this->color = $color;
    }

    public function index()
    {

        $data = $this->color->index();
        return $this->paginatedResponse($data, ColorResource::class);
     }

    public function store(StoreRequest $request)
    {
        $validation = $request->validated();
        $data = $this->color->store($validation);
        return $this->okResponse(new ColorResource($data));
     }

    public function show($id)
    {
        $data = $this->color->show($id);
        return $this->okResponse(new ColorResource($data));
    }

    public function update($id, UpdateRequest $request)
    {

        $validation = $request->validated();

        $data =  $this->color->update($id, $validation);

        return $this->okResponse(new ColorResource($data));
     }

    public function destroy($id)
    {
        $this->color->destroy($id);

        return $this->okResponse(message: translate_success_message('expense', 'deleted'));
    }
}
