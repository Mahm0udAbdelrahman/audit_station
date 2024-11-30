<?php

namespace Modules\SpecializationQuestion\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SpecializationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'category_id' => $this->subCategory->category->name,
            'sub_category_id' => $this->subCategory->name,
            'sub_sub_category' => $this->sub_sub_category ?? null,
            'question' => $this->question,
            'type' => $this->type,
            'is_correct' => $this->answers->pluck('is_correct'),
            'specialization_answer' => $this->answers->pluck('specialization_answer'),
            'created_at' => $this->created_at->format('Y-m-d H:i:s A') . ' ' . ($this->created_at->format('A') === 'AM' ? 'AM' : 'PM'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s A') . ' ' . ($this->updated_at->format('A') === 'AM' ? 'AM' : 'PM'),
        ];
    }
}
