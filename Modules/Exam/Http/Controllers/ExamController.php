<?php

namespace Modules\Exam\Http\Controllers;

use App\Helpers\ApiResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Modules\Exam\Http\Requests\Exam\StoreRequest;
use Modules\Exam\Http\Requests\Exam\UpdateRequest;
use Modules\Exam\Services\ExamService;
use Modules\Exam\Transformers\ExamResource;
use Modules\Upgrade\Enums\TypeEnum;
use Modules\Upgrade\Models\Upgrade;

class ExamController extends Controller
{
    use HttpResponse;
    public $exam;
    public function __construct(ExamService $exam)
    {
        $this->exam = $exam;
    }

    public function index()
    {
        $data = $this->exam->index();
        return $this->paginatedResponse($data, ExamResource::class);
    }

    public function store(StoreRequest $request)
    {
        $validation = $request->validated();
        $data = $this->exam->store($validation);
        return $this->okResponse(new ExamResource($data));
    }

    public function show($id)
    {
        $data = $this->exam->show($id);

        return $this->okResponse(new ExamResource($data));
    }


    public function update($id, UpdateRequest $request)
    {
        $validation = $request->validated();
        $data = $this->exam->update($id, $validation);

        return $this->okResponse(new ExamResource($data));
    }

    public function destroy($id)
    {
        $this->exam->destroy($id);
        return $this->okResponse(message: translate_success_message('expense', 'deleted'));
    }



    public function submitExam(Request $request, $examId)
    {
        $user = auth()->user();

        $upgrade = Upgrade::where('user_id', $user->id)
            ->where('exam_id', $examId)
            ->where('status', TypeEnum::Waitting)
            ->first();

        if (!$upgrade) {
            return response()->json(['message' => 'لا يوجد طلب ترقية مرتبط بهذا الامتحان'], 400);
        }

        $isPassed = $this->evaluateExam($request->answers);
        if ($isPassed) {
            $upgrade->exam_passed = true;
            $upgrade->save();
            return response()->json(['message' => 'تم تقديم الامتحان بنجاح'], 200);
        }

        return response()->json(['message' => 'لم تجتز الامتحان. يرجى المحاولة مرة أخرى.'], 400);
    }
}
