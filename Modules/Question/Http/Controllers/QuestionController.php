<?php

namespace Modules\Question\Http\Controllers;

use App\Helpers\ApiResource;
use App\Traits\HttpResponse;
use App\Http\Controllers\Controller;
use Modules\Question\Services\QuestionService;
use Modules\Question\Http\Requests\StoreRequest;
use Modules\Question\Http\Requests\UpdateRequest;
use Modules\Question\Transformers\QuestionResource;

class QuestionController extends Controller
{

    use HttpResponse;
    public $question;
    public function __construct(QuestionService $question)
    {
        $this->question = $question;
    }

    public function index()
    {
        $data = $this->question->index();
        return $this->paginatedResponse($data, QuestionResource::class);
    }

    public function store(StoreRequest $request)
    {
        $validation = $request->validated();
        $data = $this->question->store($validation);
        return $this->okResponse(new QuestionResource($data));
     }

    public function show($id)
    {
        $data = $this->question->show($id);

        return $this->okResponse(new QuestionResource($data));
    }

    public function update($id, UpdateRequest $request)
    {

        $validation = $request->validated();

        $data =  $this->question->update($id, $validation);

        return $this->okResponse(new QuestionResource($data));
    }

    public function destroy($id)
    {
        $this->question->destroy($id);

        return response()->json(['message' => 'Question Deleted successfully']);
    }
}
