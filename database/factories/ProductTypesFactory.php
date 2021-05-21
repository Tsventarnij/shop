<?php

namespace Database\Factories;

use App\Models\ProductTypes;
use App\Models\TypeValues;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductTypesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductTypes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type_value_id' => TypeValues::factory(),
        ];
    }
}
