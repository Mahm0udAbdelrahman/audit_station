<?php

namespace Modules\Cart\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user->name,
            'course_id' => $this->course_id,
            'instructor_name' => $this->course->instructor_name,
            'course_name' => $this->course->course_name,
            'course_price' => $this->course->price,
            'quantity' => $this->quantity,
            'total' => $this->course->price * $this->quantity,

        ];
    }
}
