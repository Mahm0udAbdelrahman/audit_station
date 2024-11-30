<?php

namespace Modules\Auth\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'name' => $this->name ?? null,
            'email' => $this->email ?? null,
            'phone' => $this->phone ?? null,
            'type' => $this->type ?? 'user',
            'role' => optional($this->roles->first())->name,
            'permissions' => optional($this->roles->first())->permissions ? $this->roles->first()->permissions->pluck('name')->toArray() : [],
            // 'image' => $this->whenNotNull(ResourceHelper::getFirstMediaOriginalUrl($this, 'employee_image')),
            'image' => $this->getFirstMediaUrl('employee_image'),
            'created_at' => $this->created_at->format('Y-m-d H:i:s A'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s A'),
        ];

    }
}
