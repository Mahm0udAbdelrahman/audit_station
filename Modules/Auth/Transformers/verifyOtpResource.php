<?php

namespace Modules\Auth\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class verifyOtpResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'email' => $this->email,
            'otp' => $this->otp,
        ];
    }
}
