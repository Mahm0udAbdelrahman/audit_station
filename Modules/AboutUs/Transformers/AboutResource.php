<?php

namespace Modules\AboutUs\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id'    => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'youTube_link' => $this->youTube_link,
            'image' => $this->getFirstMediaUrl('about_us_image')
        ];
    }
}
