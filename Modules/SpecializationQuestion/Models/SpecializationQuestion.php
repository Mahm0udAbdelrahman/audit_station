<?php

namespace Modules\SpecializationQuestion\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Modules\Question\Enums\SpecializationTypeEnum;
use Modules\SpecializationQuestion\Database\Factories\SpecializationQuestionFactory;
use Modules\SubCategory\Models\SubCategory;

class SpecializationQuestion extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'sub_category_id',
        'sub_sub_category',
        'question',
        'type',
    ];


    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class ,'sub_category_id', 'id');
    }

    public function answers()
    {
        return $this->hasMany(SpecializationAnswer::class , 'specialization_question_id' ,'id');
    }

     

    // protected static function newFactory(): SpecializationQuestionFactory
    // {
    //     //return SpecializationQuestionFactory::new();
    // }
}
