<?php

namespace Modules\Upgrade\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class UpgradeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'target_type' => $this->target_type,
            'status' => $this->status,
            'created_at'=>Carbon::parse($this->created_at)->format('Y:m:d h:i:s A'),
            'updated_at'=>Carbon::parse($this->updated_at)->format('Y:m:d h:i:s A'),
        ];
    }
}
