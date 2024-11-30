<?php

namespace Modules\Exam\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Exam\Database\Factories\ExamAnswerFactory;

class ExamAnswer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'exam_answers';
    protected $fillable = [
        'exam_id',
        'user_id',
        'answer',
    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // protected static function newFactory(): ExamAnswerFactory
    // {
    //     //return ExamAnswerFactory::new();
    // }
}
