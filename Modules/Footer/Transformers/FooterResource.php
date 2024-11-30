<?php

namespace Modules\Footer\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FooterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'facebook' => $this->whenHas('facebook'),
            'instagram' => $this->whenHas('instagram'),
            'twitter' => $this->whenHas('twitter'),
            'linkedin' => $this->whenHas('linkedin'),
            'youtube' => $this->whenHas('youtube'),
            'tiktok' => $this->whenHas('tiktok'),
            'snapchat' => $this->whenHas('snapchat'),
            'app_store' => $this->whenHas('app_store'),
            'google_play' => $this->whenHas('google_play'),
        ];
    }
}
