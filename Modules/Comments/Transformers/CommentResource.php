<?php

namespace Modules\Comments\Transformers;

use App\Helpers\ResourceHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class CommentResource extends JsonResource
{


    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'photo' => $this->when($this->resource && $this->resource->getFirstMedia('photo'), function () {
                return ResourceHelper::getFirstMediaOriginalUrl($this, 'photo');
            }),

            'commentable_id' => $this->commentable_id,
            'content' => $this->content,
            'blog_id' => $this->blog_id,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d h:i:s A'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d h:i:s A'),
            'parent_id' => $this->parent_id,
            'replies' => CommentResource::collection($this->whenLoaded('replies')),
        ];
    }
}
