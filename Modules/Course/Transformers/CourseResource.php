<?php

namespace Modules\Course\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Modules\Comments\Transformers\CommentResource;
use Modules\Course\Transformers\SectionResource;
use Modules\Course\Transformers\VideoResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */


    public function toArray(Request $request): array
    {

            return [
                'id' => $this->id,
                'instructor_name' => $this->instructor_name,
                'instructor_id' => $this->instructor_id,
                'course_name' => $this->course_name,
                'price' => $this->price,
                'percentage' => $this->percentage,
                'description' => $this->description,
                'date' => $this->date,
                'duration' => $this->duration,
                'lessons' => $this->lessons,
                'quizzes' => $this->quizzes,
                'level' => $this->level,
                'certifications' => $this->certifications,
                'category_id' => $this->category_id,
                'videos' => $this->videos->map(function ($video) {
                    return [
                        'id' => $video->id,
                        'title' => $video->title,
                        'photo' => $video->relationLoaded('photo') && $video->photo->isNotEmpty()
                            ? optional($video->photo->first())->original_url
                            : asset('media/1/58cc5138-b545-4eb5-a038-cef16e880364.jpg'),
                        'video_url' => $video->getFirstMediaUrl('videos') ?: asset('media/default-video.mp4'),
                    ];
                }),
                'comments' => $this->whenLoaded('comments', function () {
                    return $this->comments->map(function ($comment) {
                        return [
                            'author_name' => optional($comment->author)->name,
                            'author_photo' => optional($comment->author->photo->first())->getUrl() ?? asset('media/1/58cc5138-b545-4eb5-a038-cef16e880364.jpg'),
                            'commentable_id' => $comment->commentable_id,
                            'content' => $comment->content,
                            'blog_id' => $comment->blog_id,
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
