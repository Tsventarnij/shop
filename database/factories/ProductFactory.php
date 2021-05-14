<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductTypes;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 0, 9999),
            'category_id' => $this->faker->randomDigit() + 1,
        ];
    }

//    public function configure()
//    {
//        return $this->afterCreating(function (Product $product) {
//            ProductTypes::factory()
//            $product->hasProductTypes(10)
//        });
//    }
}
