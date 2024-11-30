<?php

namespace Modules\CertificateDesign\Transformers;

use App\Helpers\ResourceHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CertificateDesignResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'barcode_number' => $this->barcode_number,
            'certificate' => $this->getFirstMediaUrl('certificate') ?? null,
            // 'certificate' => $this->whenNotNull(ResourceHelper::getFirstMediaOriginalUrl($this, 'certificate')),

        ];
    }
}
