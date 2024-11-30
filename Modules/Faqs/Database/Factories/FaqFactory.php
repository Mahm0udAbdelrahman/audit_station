<?php

namespace Modules\Faqs\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FaqFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Faqs\Models\Faq::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [

            'title'=>'This project is a comprehensive online',
            'question' => 'This project is a comprehensive online cinema ticket booking system designed to streamline the process of reserving movie tickets. Users can browse through available movies',

        ];
    }
}

