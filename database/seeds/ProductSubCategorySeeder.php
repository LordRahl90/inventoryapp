<?php

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Faker\Factory;

class ProductSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker=Factory::create();

        for($i=0; $i<50; $i++){
            $categoryID=ProductCategory::inRandomOrder()->first()->id;
            ProductSubCategory::create([
                "product_category_id"=>$categoryID,
                "sub_category"=>$faker->word
            ]);
        }
    }
}
