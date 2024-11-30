<?php

namespace Modules\Padge\Services;

use Modules\Padge\Models\Padge;


class PadgeService
{
    public $PadgeModel;

    public function __construct(Padge $PadgeModel)
    {
        $this->PadgeModel = $PadgeModel;
    }


    public function index()
    {
        return $this->PadgeModel->paginate();
    }

    public function store(array $data)
    {

        $Padge = $this->PadgeModel->create($data);

        return $Padge;
    }

    public function show($id)
    {
        $Padge = $this->PadgeModel->findOrFail($id);
        return $Padge;
    }
    public function update($id, $data)
    {
       $Padge = $this->show($id);
        $Padge->update($data);

        return $Padge;
    }

    public function destroy($id)
    {
        $Padge = $this->show($id);
        $Padge->delete();

     }
}
