<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use App\Models\ProductTypes;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//        Category::factory(100)->create();
//        Company::factory()
//            ->count(1000)
//            ->has(Product::factory(1000)
////                ->has(ProductTypes::factory(10))
//            )
//            ->create();

        Product::factory(100)->create(['company_id' => 2]);
    }
}
