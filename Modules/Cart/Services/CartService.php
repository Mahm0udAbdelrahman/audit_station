<?php


namespace Modules\Cart\Services;

use Modules\Cart\Models\Cart;
use Modules\Course\Models\Course;

class CartService
{
    public $model;
    public function __construct(Cart $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->where('user_id', auth()->user()->id)->get();
    }



    public function store(array $data)
    {
        $course = Course::findOrFail($data['course_id']);
        $user = auth()->user()->id;



        $cart =  Cart::updateOrCreate([
            'user_id' => $user,
            'course_id' => $course->id,

        ], [
            'quantity' => $data['quantity'],
            'course_id' => $course->id,
            'user_id' => $user,

        ]);

        return $cart;
    }


    public function destroy($id)
    {
        $Cart = $this->model->findOrFail($id);
        $Cart->delete();
    }
    public function deleteAll()
    {
        $this->model->truncate();
        // $this->model->query()->delete();
    }
}
