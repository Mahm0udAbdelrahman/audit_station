<?php

namespace Modules\SpecializationQuestion\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Exam\Models\Exam;
use Modules\Question\Models\Answer;
use Modules\SpecializationQuestion\Database\Factories\SpecializationAnswerFactory;

class SpecializationAnswer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'specialization_answers';
    protected $fillable = [
        'specialization_answer',
        'is_correct',
        'specialization_question_id'
    ];


    public function specializationQuestion()
    {
        return $this->belongsTo(SpecializationQuestion::class ,'specialization_question_id', 'id');
    }

    // protected static function newFactory(): SpecializationAnswerFactory
    // {
    //     //return SpecializationAnswerFactory::new();
    // }

    public function answers()
    {
        return $this->belongsToMany(Answer::class, 'exam_questions');
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'exam_questions');
    }


    // protected function casts(): array
    // {
    //     return [
    //         'specialization_answer' => 'array',
    //     ];
    // }
}
