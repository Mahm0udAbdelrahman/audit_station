<?php

namespace Modules\Permission\Services;

 use Spatie\Permission\Models\Role;

class RoleService
{
    public $model;

    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->paginate();
    }

    public function store(array $data)
    {
        $role = $this->model->create($data);
        
        $permissions = $data['permissions'];
        $role->givePermissionTo($permissions);
        return $role;
    }

    public function show($id)
    {
        $role = $this->model->findOrFail($id);

        return $role;
    }
    public function update($id, $data)
    {
        $role = $this->show($id);
        $role->update($data);
        if(isset($data['permissions'])) {
            $role->permissions()->sync($data['permissions']);
        }
        return $role;
    }

    public function destroy($id)
    {
        $role = $this->show($id);
        $role->delete();
    }
}
