<?php

namespace Modules\Company\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Modules\Accountant\Transformers\AccountantResource;
use Modules\JobOffer\Transformers\JobOfferResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'company_name' => $this->company_name,
            'email' => $this->email,
            'status' => $this->status,
            'show' => $this->show,
            'phone' => $this->phone,
            'position' => $this->position,
            'specialization' => $this->specialization,
            'country' => $this->country,
            'company_address' => $this->company_address,
            'certificate' => $this->certificate ? url('storage/' . $this->certificate) : null,
            'job_offer_id' => $this->job_offer_id,
            // 'accountants' => AccountantResource::collection($this->whenLoaded('accountants')),

            'accountants' => $this->whenLoaded('accountants', function () {
                return $this->accountants->map(function ($accountant) {
                    return [
                        'id' => $accountant->id,
                        'name' => $accountant->name,
                        'email' => $accountant->email,
                        'status' => $accountant->status,
                        'phone' => $accountant->phone,
                        'academic_qualification' => $accountant->academic_qualification,
                        'country' => $accountant->country,
                        'certificate' => $this->certificate ? url('storage/' . $this->certificate) : null,

                    //    'certificate' => $this->getFirstMediaUrl('certificates') ?: asset('media/1/58cc5138-b545-4eb5-a038-cef16e880364.jpg'),
                        'created_at' => Carbon::parse($accountant->created_at)->format('Y-m-d h:i:s A'),
                        'updated_at' => Carbon::parse($accountant->updated_at)->format('Y-m-d h:i:s A'),
                    ];
                });
            }),

            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d h:i:s A'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d h:i:s A'),
        ];
        }


}
