<?php

namespace Modules\Language\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\Language\Http\Requests\StoreRequest;
use Modules\Language\Http\Requests\UpdateRequest;
use Modules\Language\Services\LanguageService;
use Modules\Language\Transformers\LanguageResource;

class LanguageController extends Controller
{
    use HttpResponse;
    public $Language;
    public function __construct(LanguageService $Language)
    {
        $this->Language = $Language;
    }

    public function index()
    {
            $data = $this->Language->index();
        return $this->paginatedResponse($data, LanguageResource::class);

    }

    public function store(StoreRequest $request)
    {
        $validation = $request->validated();
        $data = $this->Language->store($validation);

        return $this->okResponse(new LanguageResource($data));
    }

    public function show($id)
    {
        $data = $this->Language->show($id);
        return $this->okResponse(new LanguageResource($data));

    }

    public function update($id, UpdateRequest $request)
    {

        $validation = $request->validated();

        $data =  $this->Language->update($id, $validation);

        return $this->okResponse(new LanguageResource($data));
    }

    public function destroy($id)
    {
        $this->Language->destroy($id);

        return response()->json(['message' => 'Language deleted successfully']);
    }
}
