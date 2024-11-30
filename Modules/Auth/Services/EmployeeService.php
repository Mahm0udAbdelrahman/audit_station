<?php

namespace Modules\Auth\Services;

use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Modules\Auth\Emails\ForgetOtpEmail;
use Modules\Auth\Enums\OtpTypeEnum;
use Modules\Auth\Enums\UserTypeEnum;
use Modules\Auth\Models\OTP;
use Modules\PaymentMethod\Models\PaymentMethod;

class EmployeeService
{
    public $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->whereIn('type', [UserTypeEnum::ADMIN, UserTypeEnum::ADMIN_EMPLOYEE])->paginate();
    }

    public function store(array $data)
    {

        $data['type'] = UserTypeEnum::ADMIN_EMPLOYEE;
        $employee = $this->model->create($data);

        if (isset($data['image'])) {
            $uploadedimage = $employee->addMediaFromRequest('image')->toMediaCollection('employee_image');
         }

        if (isset($data['role'])) {
            $employee->assignRole($data['role']);
        }

        return $employee;
    }

    public function show($id)
    {
        $employee = $this->model->findOrFail($id);
        return $employee;
    }
    public function update($id, $data)
    {
        $employee = $this->show($id);
        SocialMedia::updateOrCreate(
            ['user_id' => $employee->id],
            $data
        );

        PaymentMethod::updateOrCreate(
            ['user_id' => $employee->id],
            $data
        );
        $employee->update($data);
        if (isset($data['image'])) {
            $oldimage = $employee->getFirstMedia('employee_image');
            if ($oldimage) {
                $oldimage->delete();
            }
            $uploadedimage = $employee->addMediaFromRequest('image')->toMediaCollection('employee_image');
        }
        if (isset($data['role'])) {
            $employee->syncRoles($data['role']);
        }




        return $employee;
    }

    public function destroy($id)
    {
        $employee = $this->show($id);

        $employee->delete();
    }
}
