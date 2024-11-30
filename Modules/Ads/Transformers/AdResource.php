<?php

namespace Modules\Ads\Transformers;

use App\Helpers\ResourceHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class AdResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'title'=>$this->title,
            'description'=>$this->description,
            'link'=>$this->link,

            'photo' => $this->whenNotNull(ResourceHelper::getFirstMediaOriginalUrl($this, 'ads')),
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d h:i:s A'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d h:i:s A'),
        ];
    }
}
