<?php

namespace Modules\Statistic\Services;

use Modules\Statistic\Models\Statistic;



class StatisticService
{
    public $model;

    public function __construct(Statistic $model)
    {
        $this->model = $model;
    }


    public function index()
    {
        return $this->model->paginate();
    }

    public function store(array $data)
    {

        $Statistic = $this->model->create($data);
        return $Statistic;
    }

    public function show($id)
    {
        $Statistic = $this->model->findOrFail($id);
        return $Statistic;
    }
    public function update($id, $data)
    {

        $Statistic = $this->show($id);
        $Statistic->update($data);
        return $Statistic;
    }

    public function destroy($id)
    {
        $Statistic = $this->show($id);

        $Statistic->delete();
    }
}
