<?php

namespace Modules\Subscription\Services;

 use Modules\Subscription\Models\Item;

class ItemService
{
    public $model;

    public function __construct(Item $model)
    {
        $this->model = $model;
    }


    public function index()
    {
        return $this->model->paginate();
    }

    public function store(array $data)
    {

        $Item = $this->model->create($data);
        return $Item;
    }

    public function show($id)
    {
        $Item = $this->model->findOrFail($id);
        return $Item;
    }
    public function update($id, $data)
    {

        $Item = $this->show($id);
        $Item->update($data);
        return $Item;
    }

    public function destroy($id)
    {
        $Item = $this->show($id);

        $Item->delete();
    }
}
