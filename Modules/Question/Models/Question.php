<?php

namespace Modules\Question\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Question\Database\Factories\QuestionFactory;
use Modules\Question\Enums\QuestionTypeEnum;

class Question extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable =
    [
        'question',
        'type'
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id' ,'id');
    }


    public function singleQuestion()
    {
        $this->type = QuestionTypeEnum::Single;
        $this->save();
    }

    public function multipleQuestion()
    {
        $this->type = QuestionTypeEnum::Multiple;
        $this->save();
    }

    // protected static function newFactory(): QuestionFactory
    // {
    //     //return QuestionFactory::new();
    // }
}
