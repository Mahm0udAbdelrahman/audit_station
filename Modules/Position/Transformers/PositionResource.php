<?php

namespace Modules\Position\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PositionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'status' => $this->status,
            'created_at' => $this->created_at->format('Y-m-d H:i:s') . ' ' . ($this->created_at->format('A') === 'AM' ? 'AM' : 'PM'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s') . ' ' . ($this->created_at->format('A') === 'AM' ? 'AM' : 'PM'),
        ];

    }
}
