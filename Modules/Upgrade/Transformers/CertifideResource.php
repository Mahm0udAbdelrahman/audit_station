<?php

namespace Modules\Upgrade\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class CertifideResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'education_qualifications' => $this->education_qualifications,
            'university_name' => $this->university_name,
            'degree_title' => $this->degree_title,
            'GPA' => $this->GPA,
            'year_of_graduation' => $this->year_of_graduation,
            'certificate_name' => $this->certificate_name,
            'certificate_type' => $this->certificate_type,
            'source_of_certificate' => $this->source_of_certificate,
            'courses_name' => $this->courses_name,
            'years_of_experience' => $this->years_of_experience,
            'company_name' => $this->company_name,
            'company_title' => $this->company_title,
            'company_location' => $this->company_location,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'user_id' => $this->user_id,

            'photo' => $this->whenLoaded('certifide', function () {
                return $this->photo->first()?->original_url ?? asset('media/1/58cc5138-b545-4eb5-a038-cef16e880364.jpg');
            }),
            'created_at'=>Carbon::parse($this->created_at)->format('Y:m:d h:i:s A'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y:m:d h:i:s A')
        ];
    }
}
