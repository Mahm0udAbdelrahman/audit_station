<?php

namespace Modules\Blogs\Transformers;

use App\Helpers\ResourceHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Modules\Comments\Transformers\CommentResource;

class BlogsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'photo' => $this->resource && $this->resource->getFirstMedia('photo')
                ? ResourceHelper::getFirstMediaOriginalUrl($this, 'photo')
                : asset('media/9/58cc5138-b545-4eb5-a038-cef16e880364.jpg'),
            'title' => $this->title,
            'description' => $this->description,
            'facebook' => $this->when($this->facebook, $this->facebook),
            'instagram' => $this->when($this->instagram, $this->instagram),
            'twitter' => $this->when($this->twitter, $this->twitter),
            'linkedin' => $this->when($this->linkedin, $this->linkedin),
            'youtube' => $this->when($this->youtube, $this->youtube),
            'tiktok' => $this->when($this->tiktok, $this->tiktok),
            'tags' => $this->tags,
            'category_id' => $this->category_id,
            'author_id' => $this->author_id,
            'sub_category_id' => $this->sub_category_id,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d h:i:s A'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d h:i:s A'),
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
        ];
    }
}
