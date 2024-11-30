<?php

namespace Modules\Videos\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Modules\Comments\Transformers\CommentResource;

class VideoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'title' => $this->title,
            'photo' => $this->relationLoaded('photo')
                ? $this->photo->first()->original_url ?? asset('media/1/58cc5138-b545-4eb5-a038-cef16e880364.jpg')
                : asset('media/1/58cc5138-b545-4eb5-a038-cef16e880364.jpg'),
            'course_id' => $this->course_id,
            'video_url' => $this->getFirstMediaUrl('videos') ?: asset('media/default.mp4'),
            'comments' => $this->whenLoaded('comments', function () {
                return $this->comments->map(function ($comment) {
                    return [
                        'author_name' => optional($comment->author)->name,
                        'author_photo' => optional($comment->author->photo->first())->getUrl() ?? asset('media/1/58cc5138-b545-4eb5-a038-cef16e880364.jpg'),
                        'commentable_id' => $comment->commentable_id,
                        'content' => $comment->content,
                        'blog_id' => $comment->blog_id,
                        'created_at' => Carbon::parse($comment->created_at)->format('Y-m-d h:i:s A'),
                        'updated_at' => Carbon::parse($comment->updated_at)->format('Y-m-d h:i:s A'),
                        'parent_id' => $comment->parent_id,
                        'replies' => CommentResource::collection($comment->replies),
                    ];
                });
            }),
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d h:i:s A'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d h:i:s A'),
        ];

    }
}
