<?php

namespace Modules\SendOffer\Transformers;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SendOfferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'sallery' => $this->sallery,
            'country' => $this->country,
            'date' => $this->date,
            'type' => $this->type,
            'description_job' => $this->description_job,
            'benefits_job' => $this->benefits_job,
            'terms_job' => $this->terms_job,
            'company_name' => $this->company_name,
            'company_id' => $this->company_id,

            'created_at' => $this->created_at ? Carbon::parse($this->created_at)->format('Y-m-d h:i:s A') : null,
            'updated_at' => $this->updated_at ? Carbon::parse($this->updated_at)->format('Y-m-d h:i:s A') : null,

        ];
    }
}
