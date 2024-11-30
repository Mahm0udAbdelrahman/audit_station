<?php

namespace Modules\Accountant\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Modules\JobOffer\Transformers\JobOfferResource;

class AccountantResource extends JsonResource
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
            'phone' => $this->phone,
            'status' => $this->status,
            'country' => $this->country,
            'academic_qualification' => $this->academic_qualification,
            'position' => $this->position,
            'experience' => $this->experience,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'certificate' => $this->certificate ? url('storage/' . $this->certificate) : null,
            'user_id' => $this->user_id,
            'admin_id' => $this->admin_id,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d h:i:s A'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d h:i:s A'),

        ];
    }
}
