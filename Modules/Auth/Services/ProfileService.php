<?php

namespace Modules\Auth\Services;
use App\Models\SocialMedia;
use Modules\PaymentMethod\Models\PaymentMethod;
class ProfileService
{
    public function showProfile()
    {
        return auth()->user();
    }
    public function profile($data)
    {

        $profile = auth()->user();


        SocialMedia::updateOrCreate(
            ['user_id' => $profile->id],
            $data
        );

        PaymentMethod::updateOrCreate(
            ['user_id' => $profile->id],
            $data
        );
        $profile->update($data);
        if (isset($data['image'])) {
            $oldimage = $profile->getFirstMedia('profile_image');
            if ($oldimage) {
                $oldimage->delete();
            }
            $uploadedimage = $profile->addMediaFromRequest('image')->toMediaCollection('profile_image');
        }


        return $profile;
    }
}
