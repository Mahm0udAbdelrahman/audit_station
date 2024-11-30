<?php


namespace Modules\Exam\Services;

use Modules\Exam\Models\Exam;
use Modules\Exam\Models\ExamAnswer;
use Modules\Question\Models\Answer;

class AnswerExamService
{

    public function answer($data)
    {
        dd($data);
        $answers = $data['answer'];

        $exam = Exam::where('id', $data['exam_id'])->first();
        $question = $exam->questions()->where('id', $answers[0]['question_id'])->first();
        $anaswer =  $question->answers()->where('id', $data['answer']);

        foreach ($answers as $answer) {
            ExamAnswer::create([
                'exam_id' => $exam->id,
                'question_id' => $question,
                'answer' => $anaswer,
            ]);
        }
        return $exam;
    }
}
