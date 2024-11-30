<?php

namespace Modules\Exam\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'exam_name' => $this->exam_name,
            'total_grade' => $this->total_grade,
            'mark_of_success' => $this->mark_of_success,
            'exam_duration' => $this->exam_duration,
            'number_of_questions' => $this->number_of_questions,
            'must_be_finished_in_one_sitting' => $this->must_be_finished_in_one_sitting,
            'questions_displayed_per_page' => $this->questions_displayed_per_page,
            'question_general' => $this->questions->pluck('question')->unique(),
            'answers' => $this->questions->map(function ($question) {
                return [
                    'question' => $question->question,
                    'answers' => $question->answers->pluck('answer')
                ];
            }),
            'question_specialization' => $this->specializationQuestions->pluck('question')->unique(),
            'specialization_answers' => $this->specializationQuestions->map(function ($question) {
                return [
                    'question' => $question->question,
                    'specialization_answers' => $question->answers->pluck('specialization_answer'),
                ];
            }),
            'status' => $this->status,
            'created_at' => $this->created_at->format('Y-m-d H:i:s A'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s A'),
        ];
    }
}
