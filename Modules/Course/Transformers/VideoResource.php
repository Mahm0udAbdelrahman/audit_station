<?php

namespace Modules\Course\Transformers;

use App\Helpers\ResourceHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return
            [
                'id' => $this->id,
                'section_id' => $this->section_id,
                'section_name' => $this->section->section_name,
                // 'video' => $this->getFirstMedia('videos')->getFullUrl(),
                'video' => $this->whenNotNull(ResourceHelper::getFirstMediaOriginalUrl($this, 'video')),
                'video_name' => $this->video_name,
                'duration' => $this->duration,
                'status' => $this->status,
            ];
    }
}
