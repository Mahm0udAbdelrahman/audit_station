<?php

namespace Modules\BecomeCompany\Transformers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class BecomeCompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'company_name' => $this->company_name,
            'owner_name' => $this->owner_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'company_address' => $this->company_address,
            'company_work' => $this->company_work,
            'position_in_company' => $this->position_in_company,
            'company_headquarter' => $this->company_headquarter,
            'company_logo' => $this->whenLoaded('media', function () {
                return $this->getFirstMediaUrl('photo') ?: asset('media/1/58cc5138-b545-4eb5-a038-cef16e880364.jpg');
            }),
            'license_and_tex_infomation' => $this->whenLoaded('media', function () {
                return $this->getFirstMediaUrl('license_and_tex_information') ?: asset('media/1/58cc5138-b545-4eb5-a038-cef16e880364.jpg');
            }),

            'status' => $this->status,
            'show' => $this->show,
            'user_id' => $this->user_id,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s A'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d H:i:s A'),
        ];
    }
}
