<?php

namespace Modules\OurTeam\Transformers;

use App\Helpers\ResourceHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OurTeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'position' => $this->position->title ?? null,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'tiktok' => $this->tiktok,
            'youtube' => $this->youtube,
            'twitter' => $this->twitter,
            'linkedin' => $this->linkedin,
            'whatsapp' => $this->whatsapp,
            'snapchat' => $this->snapchat,
            'telegram' => $this->telegram,
            'image' => $this->getFirstMediaUrl('OurTeams') ?? null,
            // 'image' => $this->whenNotNull(ResourceHelper::getFirstMediaOriginalUrl($this, 'OurTeams')),
            'status' => $this->status,
            'created_at' => $this->created_at->format('Y-m-d H:i:s') . ' ' . ($this->created_at->format('A') === 'AM' ? 'AM' : 'PM'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s') . ' ' . ($this->updated_at->format('A') === 'AM' ? 'AM' : 'PM'),
        ];
    }
}
