<?php

namespace Modules\SocialMedia\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SocialMediaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'facebook' => $this->facebook ?? null,
            'twitter' => $this->twitter ?? null,
            'instagram' => $this->instagram ?? null,
            'linkedin' => $this->linkedin ?? null,
            'github' => $this->github ?? null,
            'youtube' => $this->youtube ?? null,

    ];
    }
}
