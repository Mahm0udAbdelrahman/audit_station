<?php

namespace Modules\JobOffer\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class JobOfferResource extends JsonResource
{



    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'position' => $this->position,
            'date' => $this->date,
            'sallary' => $this->sallary,
            'country' => $this->country,
            'status' => $this->status,
            'experience' => $this->experience,
            'education' => $this->education,
            'type' => $this->type,
            'is_favorite' => $this->is_favorite,
            'show' => $this->show,
            'company_id'=>$this->company_id,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d h:i:s A'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d h:i:s A'),
        ];
    }
}
