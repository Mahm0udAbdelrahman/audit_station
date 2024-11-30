<?php

namespace Modules\PaymentMethod\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentMethodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return  [
            'id' => $this->id,
            'payout_account' => $this->payout_account,
            'holder_name' => $this->holder_name,
            'card_number' => $this->maskCardNumber($this->card_number),
            'cvv' => $this->cvv,
            'expire_date' => $this->expire_date,
            'status' => $this->status
        ];
    }
    private function maskCardNumber($cardNumber)
    {
        return str_repeat('*', strlen($cardNumber) - 4) . substr($cardNumber, -4);
    }
}
