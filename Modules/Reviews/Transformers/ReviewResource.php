<?php

namespace Modules\Reviews\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'course_name' => $this->course_name,
            'user_id' => $this->user_id,
            'course_id' => $this->course_id,
            'review' => $this->review,
            'reviewable' => $this->reviewable,
            'rating' => $this->rating,
            'approval_status' => $this->approval_status,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d h:i:s A'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d h:i:s A'),
        ];
    }
}
