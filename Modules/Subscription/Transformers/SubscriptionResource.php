<?php

namespace Modules\Subscription\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'duration' => $this->duration,
            'amount_by_dollar' => $this->amount_by_dollar,
            'amount_by_coins' => $this->amount_by_coins,
            'description' => $this->items->pluck('description') ?? null,
            'status' => $this->status
        ];
    }
}
