<?php

namespace Modules\PaymentMethod\Services;

use Illuminate\Support\Facades\Hash;
use Modules\PaymentMethod\Models\PaymentMethod;



class PaymentMethodService
{
    public $model;

    public function __construct(PaymentMethod $model)
    {
        $this->model = $model;
    }


    public function index()
    {
        return $this->model->paginate();
    }

    public function store(array $data)
    {
        $data['user_id'] = auth()->user()->id;
        $data['card_number'] = Hash::make($data['card_number']);
        $PaymentMethod = $this->model->create($data);
        return $PaymentMethod;
    }

    public function show($id)
    {
        $PaymentMethod = $this->model->findOrFail($id);
        $lastFourDigits = substr($PaymentMethod->card_number_plain_text, -4);
        return $PaymentMethod;
    }
    public function update($id, $data)
    {

        $PaymentMethod = $this->show($id);
        $PaymentMethod->update($data);
        return $PaymentMethod;
    }

    public function destroy($id)
    {
        $PaymentMethod = $this->show($id);

        $PaymentMethod->delete();
    }
}
