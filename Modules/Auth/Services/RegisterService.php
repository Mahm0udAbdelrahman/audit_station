<?php

namespace Modules\Auth\Services;

use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Modules\Auth\Emails\ForgetOtpEmail;
use Modules\Auth\Enums\OtpTypeEnum;
use Modules\Auth\Models\OTP;
use Modules\PaymentMethod\Models\PaymentMethod;

class RegisterService
{
    public $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->paginate();
    }

    public function store(array $data)
    {


        $register = $this->model->create($data);

        if (isset($data['image'])) {
            $uploadedimage = $register->addMediaFromRequest('image')->toMediaCollection('profile_image');
         }

        if ($register) {
            $otpData = OTP::create([
                'user_id' => $register->id,
                'email' => $register->email,
                'otp' => rand(1000, 9999),
                'type' => OtpTypeEnum::Register,
                'expire_at' => now()->addMinutes(1),
            ]);

            Mail::to($data['email'])->send(new ForgetOtpEmail($otpData['otp']));
        }
        return $register;
    }







    public function show($id)
    {
        $register = $this->model->findOrFail($id);
        return $register;
    }
    public function update($id, $data)
    {
        $register = $this->show($id);
        SocialMedia::updateOrCreate(
            ['user_id' => $register->id],
            $data
        );

        PaymentMethod::updateOrCreate(
            ['user_id' => $register->id],
            $data
        );
        $register->update($data);
        if (isset($data['image'])) {
            $oldimage = $register->getFirstMedia('profile_image');
            if ($oldimage) {
                $oldimage->delete();
            }
            $uploadedimage = $register->addMediaFromRequest('image')->toMediaCollection('profile_image');
        }
        // if (isset($data['role'])) {
        //     $register->syncRoles($data['role']);
        // }




        return $register;
    }

    public function destroy($id)
    {
        $register = $this->show($id);

        $register->delete();
    }
}
