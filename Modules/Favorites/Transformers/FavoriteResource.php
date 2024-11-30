<?php

namespace Modules\Favorites\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Modules\Course\Transformers\CourseResource;
use Modules\Courses\Models\Course;
use Modules\Videos\Transformers\VideoResource;

class FavoriteResource extends JsonResource
{



    public function toArray(Request $request): array
{
    return [
        'id' => $this->id,
        'video_id' => $this->video_id,
        'video_path' => VideoResource::collection($this->whenLoaded('video_path')),
        'course' =>  CourseResource::collection($this->whenLoaded('course')),
        'user_id' => $this->user_id,
        'created_at' => Carbon::parse($this->created_at)->format('Y-m-d h:i:s A'),
        'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d h:i:s A'),
    ];
}

}
