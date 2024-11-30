<?php

namespace Modules\Position\Services;

use Modules\Position\Models\Position;



class PositionService
{
    public $PositionModel;

    public function __construct(Position $PositionModel)
    {
        $this->PositionModel = $PositionModel;
    }


    public function index()
    {
        return $this->PositionModel->paginate();
    }

    public function store(array $data)
    {

        $Position = $this->PositionModel->create($data);
        return $Position;
    }

    public function show($id)
    {
        $Position = $this->PositionModel->findOrFail($id);
        return $Position;
    }
    public function update($id, $data)
    {

        $Position = $this->show($id);
        $Position->update($data);
        return $Position;
    }

    public function destroy($id)
    {
        $Position = $this->show($id);

        $Position->delete();

     }
}
