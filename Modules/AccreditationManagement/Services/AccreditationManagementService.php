<?php

namespace Modules\AccreditationManagement\Services;

use Modules\AccreditationManagement\Models\AccreditationManagement;

class AccreditationManagementService
{
    public $model;

    public function __construct(AccreditationManagement $model)
    {
        $this->model = $model;
    }


    public function index()
    {
        return $this->model->paginate();
    }

    public function store(array $data)
    {

        $AccreditationManagement = $this->model->create($data);
        return $AccreditationManagement;
    }

    public function show($id)
    {
        $AccreditationManagement = $this->model->findOrFail($id);
        return $AccreditationManagement;
    }
    public function update($id, $data)
    {

        $AccreditationManagement = $this->show($id);
        $AccreditationManagement->update($data);
        return $AccreditationManagement;
    }

    public function destroy($id)
    {
        $AccreditationManagement = $this->show($id);

        $AccreditationManagement->delete();
    }
}
