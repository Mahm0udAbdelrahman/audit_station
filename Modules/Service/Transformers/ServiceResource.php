<?php

namespace Modules\Service\Transformers;

use App\Helpers\ResourceHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'image' => $this->getFirstMediaUrl('services') ?? null,
            // 'image' => $this->whenNotNull(ResourceHelper::getFirstMediaOriginalUrl($this, 'services')),
            'created_at' => $this->created_at->format('Y-m-d H:i:s') . ' ' . ($this->created_at->format('A') === 'AM' ? 'AM' : 'PM'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s') . ' ' . ($this->created_at->format('A') === 'AM' ? 'AM' : 'PM'),

        ];
    }
}
