<?php

namespace Modules\Padge\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PadgeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'color' => $this->color->name ?? null,
            'type' => $this->type,
            'status' => $this->status,

        ];
    }
}
