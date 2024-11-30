<?php

namespace Modules\Interviewerr\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class AvailabilityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,
            'interviewer' => new InterviewerrResource($this->whenLoaded('interviewer')),
            'from_time' => $this->from_time,
            'time_to' => $this->time_to,
            'notes' => $this->notes,
            'description' => $this->description,
            'to_job' => $this->to_job,
            'type' => $this->type,
            'created_at'=>Carbon::parse($this->created_at)->format('Y:m:d h:i:s A'),
            'updated_at'=>Carbon::parse($this->updated_at)->format('Y:m:d h:i:s A'),
        ];
    }
}
