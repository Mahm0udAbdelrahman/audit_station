<?php

namespace Modules\Exam\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Illuminate\Support\Facades\Request;
use Modules\Exam\Models\Exam;
use Modules\Exam\Models\ExamAnswer;
use Modules\Exam\Services\AnswerExamService;

class AnswerExamController extends Controller
{
    use HttpResponse;
    public $answer;
    public function __construct(AnswerExamService $answer)
    {
        $this->answer = $answer;
    }


    public function store(Request $request)
    {
        return $this->answer->answer($request->all());
    }
}
