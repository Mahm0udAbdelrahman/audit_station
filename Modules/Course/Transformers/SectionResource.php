<?php

namespace Modules\Course\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            // 'course_id' => $this->course_id,
            // 'course_name' => $this->course->course_name,
            'course' => CourseResource::make($this->whenLoaded('course')),
            'section_name' => $this->section_name,
            'Videos' => VideoResource::collection($this->whenLoaded('videos')),
        ];
    }
}
