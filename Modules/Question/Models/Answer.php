<?php

namespace Modules\Question\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Exam\Models\Exam;
use Modules\Question\Database\Factories\AnswerFactory;
use Modules\SpecializationQuestion\Models\SpecializationAnswer;

class Answer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'answer',
        'is_correct',
        'question_id',

    ];

    public function question()
    {
        return $this->belongsTo(Question::class , 'question_id' ,'id');
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'exam_questions');
    }

    public function specializationAnswers()
    {
        return $this->belongsToMany(SpecializationAnswer::class, 'exam_questions');
    }

    // protected static function newFactory(): AnswerFactory
    // {
    //     //return AnswerFactory::new();
    // }

    // protected function casts(): array
    // {
    //     return [
    //          'answer' => 'array',
    //     ];
    // }
}
