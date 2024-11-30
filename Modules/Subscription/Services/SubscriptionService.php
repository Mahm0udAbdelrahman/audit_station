<?php

namespace Modules\Subscription\Services;

use Modules\Subscription\Models\Subscription;

class SubscriptionService
{
    public $model;

    public function __construct(Subscription $model)
    {
        $this->model = $model;
    }


    public function index()
    {
        return $this->model->where('status', 1)->paginate();
    }

    public function store(array $data)
    {

        $Subscription = $this->model->create($data);
        $items = $data['items'];
        $Subscription->items()->attach($items);
        return $Subscription;
    }

    public function show($id)
    {
        $Subscription = $this->model->findOrFail($id);
        return $Subscription;
    }
    public function update($id, $data)
    {

        $Subscription = $this->show($id);
        $Subscription->update($data);
        if(isset($data['items'])) {
            $Subscription->items()->sync($data['items']);
        }
        return $Subscription;
    }

    public function destroy($id)
    {
        $Subscription = $this->show($id);

        $Subscription->delete();
    }
}
