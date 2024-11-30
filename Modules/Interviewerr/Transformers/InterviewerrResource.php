<?php

namespace Modules\Interviewerr\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class InterviewerrResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'status' => $this->status,
            'show' => $this->show,
            'permission' => $this->permission,
            'phone' => $this->phone,
            'country' => $this->country,
            'level_education' => $this->level_education,
            'certificate' => $this->certificate ? url('storage/' . $this->certificate) : null,
            'user_id' => $this->user_id,
            'admin_id' => $this->admin_id,
            'created_at'=> Carbon::parse($this->created_at)->format('Y-m-d h:i:s A'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d h:i:s A'),
        ];
    }
}
