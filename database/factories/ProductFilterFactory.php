<?php

namespace Database\Factories;

use App\Domain\Filter\Filter;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFilterFactory extends Factory
{
    protected $model = Filter::class;

    public function definition(): array
    {
        return [
            'name' => strtoupper($this->faker->bothify('?????-##')),
        ];
    }
}
