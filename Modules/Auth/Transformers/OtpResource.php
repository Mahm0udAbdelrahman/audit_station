<?php

namespace Modules\Auth\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Auth\Models\OTP;

class OtpResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */

     public function otp()
     {
         return OTP::where('user_id', $this->id)->first();
     }

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->otp()->user_id ?? $this->user_id,
            'email' => $this->email,
            'expire_at' => now()->addMinutes(5)->format('Y-m-d h:i:s A'),
            'created_at' => $this->created_at->format('Y-m-d H:i:s') . ' ' . ($this->created_at->format('A') === 'AM' ? 'AM' : 'PM'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s') . ' ' . ($this->updated_at->format('A') === 'AM' ? 'AM' : 'PM'),
        ];
    }
}
