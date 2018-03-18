<?php

use Illuminate\Database\Seeder;
use App\Models\ProductSubCategory;
use App\Models\Product;
use  Faker\Factory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Factory::create();


        for ($i=1; $i<=100; $i++){
            $subCategoryID=ProductSubCategory::inRandomOrder()->first();
            Product::create([
                "product_sub_category_id"=>$subCategoryID->id,
                "name"=>$faker->sentence(2),
                "description"=>$faker->paragraph(),
                "price"=>$faker->randomElement([5000,1000,50000,100000,670000,10000,400000,430000])
            ]);
        }
    }
}
