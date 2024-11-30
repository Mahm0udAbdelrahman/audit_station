<?php

namespace Modules\AccreditationManagement\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccreditationManagementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'grade' => $this->grade,
            'minimum_degree' => $this->minimum_degree,
            'maximum_degree' => $this->maximum_degree
        ];
    }
}
