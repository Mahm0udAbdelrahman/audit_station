<?php

namespace Modules\Instructor\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExperienceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [

            'position' => $this->position,
            'experience' => $this->experience,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ];
    }
}
