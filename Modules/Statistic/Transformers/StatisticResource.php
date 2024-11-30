<?php

namespace Modules\Statistic\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StatisticResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return[
            'number_of' => $this->number_of,
            'title' => $this->title
        ];
    }
}
