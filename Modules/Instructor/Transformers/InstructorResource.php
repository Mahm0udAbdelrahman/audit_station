<?php

namespace Modules\Instructor\Transformers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Course\Transformers\CourseResource;
use Modules\Course\Transformers\VideoResource;

class InstructorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            
            'name' => $this->user->name,
            'email' => $this->user->email,
            'nationality' => $this->nationality,
            'university' => $this->university,
            'degree'=>$this->degree,
            'address'=>$this->address,
            'previous_work'=>$this->previous_work,
            'description' => $this->description,
            'approval_status' => $this->approval_status,
            'experiences' => $this->experiences->map(function ($experience) {
                return [
                    'id' => $experience->id,
                    'position' => $experience->position,
                    'experience' => $experience->experience,
                    'start_date' => $experience->start_date,
                    'end_date' => $experience->end_date,
                ];
            }),
            'courses' => $this->courses->map(function ($course) {
                return [
                    'id' => $course->id,
                    'course_name' => $course->course_name,
                    'videos' => $course->videos->map(function ($video) {
                        return [
                            'id' => $video->id,
                            'title' => $video->title,
                            'url' => $video->url,
                            'photo' => $video->photo->first()?->original_url ?? asset('media/default.jpg'),
                        ];
                    }),
                ];
            }),
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d h:i:s A'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d h:i:s A'),
        ];
    }

}
