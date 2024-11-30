<?php

namespace Modules\Auth\Transformers;

use App\Helpers\ResourceHelper;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Modules\PaymentMethod\Models\PaymentMethod;

class RegisterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */


    public function toArray(Request $request): array
    {


        return [
            'id' => $this->id,
            'name' => $this->name ?? null,
            'email' => $this->email ?? null,
            'phone' => $this->phone ?? null,
            'type' => $this->type ?? 'user',
            'image' => $this->whenNotNull(ResourceHelper::getFirstMediaOriginalUrl($this, 'profile_image')),
            'created_at' => $this->created_at->format('Y-m-d H:i:s A'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s A'),
        ];
    }
}
