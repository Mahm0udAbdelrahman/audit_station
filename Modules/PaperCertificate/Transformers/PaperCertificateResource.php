<?php

namespace Modules\PaperCertificate\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaperCertificateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'communication_method' => $this->communication_method,
            'link' => $this->link,
        ];
    }
}
