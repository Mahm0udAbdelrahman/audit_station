<?php

namespace Modules\AccountantOffer\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class AccountantOfferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'position' => $this->position,
            'date' => $this->date,
            'sallery' => $this->sallery,
            'type' => $this->type,
            'status' => $this->status,
            'accountant_id' => $this->accountant_id,
            'show' => $this->show,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s A'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d H:i:s A'),
        ];
    }
}
