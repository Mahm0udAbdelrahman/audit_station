<?php

namespace Modules\AboutUs\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class AboutusResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'photo' => $this->whenLoaded('photo', function () {
                return $this->photo->first()?->original_url ?? asset('media/1/58cc5138-b545-4eb5-a038-cef16e880364.jpg');
            }),
            'description' => $this->description,
            'YouTube_Link' => $this->YouTube_Link,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d h:i:s A'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d h:i:s A'),
        ];
    }
}
