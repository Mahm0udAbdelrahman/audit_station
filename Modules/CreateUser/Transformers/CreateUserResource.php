<?php

namespace Modules\CreateUser\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CreateUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
         return
            [
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'role' => $this->roles->first()->name ?? null,
                'image' => $this->getFirstMediaUrl('profile_image') ?? null,
                'created_at' => $this->created_at->format('Y-m-d H:i:s') . ' ' . ($this->created_at->format('A') === 'AM' ? 'AM' : 'PM'),
                'updated_at' => $this->updated_at->format('Y-m-d H:i:s') . ' ' . ($this->updated_at->format('A') === 'AM' ? 'AM' : 'PM'),
            ];
    }
}
