<?php

namespace Modules\Setting\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'language' => $this->language,
            'mood' => $this->mood,
            'head_quarters' => $this->head_quarters,
            'our_branches' => $this->our_branches,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'facebook' => $this->when($this->facebook, $this->facebook),
            'instagram' => $this->when($this->instagram, $this->instagram),
            'twitter' => $this->when($this->twitter, $this->twitter),
            'linkedin' => $this->when($this->linkedin, $this->linkedin),
            'youtube' => $this->when($this->youtube, $this->youtube),
            'tiktok' => $this->when($this->tiktok, $this->tiktok),
            'snapchat' => $this->when($this->snapchat, $this->snapchat),
            'app_store' => $this->when($this->app_store, $this->app_store),
            'google_play' => $this->when($this->google_play, $this->google_play),
        ];

    }
}
