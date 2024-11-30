<?php

namespace Modules\Exam\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Exam\Database\Factories\ExamFactory;
use Modules\Exam\Enums\ExamStatusEnum;
use Modules\Question\Models\Answer;
use Modules\Question\Models\Question;
use Modules\SpecializationQuestion\Models\SpecializationAnswer;
use Modules\SpecializationQuestion\Models\SpecializationQuestion;

class Exam extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'exam_name',
        'total_grade',
        'mark_of_success',
        'exam_duration',
        'number_of_questions',
        'must_be_finished_in_one_sitting',
        'questions_displayed_per_page',
        'status',

    ];

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'exam_questions');
    }

    public function specializationQuestions()
    {
        return $this->belongsToMany(SpecializationQuestion::class, 'exam_questions');
    }




    // protected static function newFactory(): ExamFactory
    // {
    //     //return ExamFactory::new();
    // }
}
