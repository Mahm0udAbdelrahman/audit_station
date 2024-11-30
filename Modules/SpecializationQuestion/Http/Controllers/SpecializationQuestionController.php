<?php

namespace Modules\SpecializationQuestion\Http\Controllers;

use App\Helpers\ApiResource;
use App\Traits\HttpResponse;
use App\Http\Controllers\Controller;
use Modules\SpecializationQuestion\Http\Requests\StoreRequest;
use Modules\SpecializationQuestion\Http\Requests\UpdateRequest;
use Modules\SpecializationQuestion\Transformers\SpecializationResource;
use Modules\SpecializationQuestion\Services\SpecializationQuestionService;

class SpecializationQuestionController extends Controller
{
    use HttpResponse;
    public $question;
    public function __construct(SpecializationQuestionService $question)
    {
        $this->question = $question;
    }

    public function index()
    {
        $data = $this->question->index();

        return $this->paginatedResponse($data, SpecializationResource::class);
    }

    public function store(StoreRequest $request)
    {
        $validation = $request->validated();
        $data = $this->question->store($validation);

        return $this->okResponse(new SpecializationResource($data));
    }

    public function show($id)
    {
        $data = $this->question->show($id);

        return $this->okResponse(new SpecializationResource($data));
    }


    public function update($id, UpdateRequest $request)
    {
        $validation = $request->validated();
        $data = $this->question->update($id, $validation);

        return $this->okResponse(new SpecializationResource($data));
    }

    public function destroy($id)
    {
        $data = $this->question->destroy($id);
        return response()->json(['message' => 'Question deleted successfully']);
        }
}
