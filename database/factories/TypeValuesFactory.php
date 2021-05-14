<?php

namespace Database\Factories;

use App\Models\Type;
use App\Models\TypeValues;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypeValuesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TypeValues::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type_id' => Type::factory(),
            'values' => $this->faker->word()
        ];
    }
}
