<?php

namespace Modules\StepsToBeUnique\Transformers;

use App\Helpers\ResourceHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StepsToBeUniqueResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
        'id' => $this->id,
        'title' => $this->title,
        'number_of_the_step' => $this->number_of_the_step,
        'photo' => $this->getFirstMediaUrl('photos', 'thumb'),
        // 'photo' => $this->whenNotNull(ResourceHelper::getFirstMediaOriginalUrl($this, 'photos')),
    ];
    }
}
