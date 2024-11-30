<?php

namespace Modules\Category\Transformers;

use App\Helpers\ResourceHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Modules\Course\Transformers\CourseResource;

class CategoryResource extends JsonResource
{



    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'courses' => $this->courses->map(function ($course) {
                return [
                    'id' => $course->id,
                    'course_name' => $course->course_name,
                    'instructor_name' => $course->instructor_name,
                    'price' => $course->price,
                    'percentage' => $course->percentage,
                    'description' => $this->description,
                    'date' => $course->date,
                    'duration' => $course->duration,
                    'lessons' => $course->lessons,
                    'quizzes' => $course->quizzes,
                    'level' => $course->level,
                    'certifications' => $course->certifications,
                    'videos' => $course->videos->map(function ($video) {
                        return [
                            'id' => $video->id,
                            'title' => $video->title,
                            'image' => $this->whenNotNull(ResourceHelper::getFirstMediaOriginalUrl($this, 'image')),
                            'video_url' => $video->getFirstMediaUrl('videos') ?: asset('media/default-video.mp4'),

                        ];
                    }),
                ];
            }),
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d h:i:s A'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d h:i:s A'),
        ];
    }
}
