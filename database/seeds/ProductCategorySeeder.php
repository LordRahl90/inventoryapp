<?php

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=["Electronics","Cleaning Agents","Furnitures","Clothings","Food and Drink"];

        foreach ($categories as $category){
            ProductCategory::create([
                "category"=>$category
            ]);
        }
    }
}
