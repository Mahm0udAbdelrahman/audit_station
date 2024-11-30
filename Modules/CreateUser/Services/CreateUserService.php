<?php

namespace Modules\CreateUser\Services;

use Modules\CreateUser\Models\CreateUser;


class CreateUserService
{
    public $model;

    public function __construct(CreateUser $model)
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
        if (isset($data['role'])) {
            $register->assignRole($data['role']);
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
        $register->update($data);
        if (isset($data['image'])) {
            $oldimage = $register->getFirstMedia('profile_image');
            if ($oldimage) {
                $oldimage->delete();
            }
            $uploadedimage = $register->addMediaFromRequest('image')->toMediaCollection('profile_image');
        }
        if (isset($data['role'])) {
            $register->syncRoles($data['role']);
        }

        return $register;
    }

    public function destroy($id)
    {
        $register = $this->show($id);

        $register->delete();
    }
}
