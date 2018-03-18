<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Product;
use App\Models\ProductInventory;
use App\Models\ProductProcurement;

class ProcurementSeeder extends Seeder
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
            $productID=Product::inRandomOrder()->first();
            $documentRef=strtoupper(uniqid("PR"));
            $quantity=$faker->randomNumber(5);
            $narration=$faker->sentence(20);

            ProductProcurement::create([
                "productID"=>$productID->id,
                "documentRef"=>$documentRef,
                "narration"=>$narration,
                "quantity"=>$quantity,
                "price"=>$productID->price
            ]);

            ProductInventory::create([
                "productID"=>$productID->id,
                "inventoryRef"=>$documentRef,
                "narration"=>$narration,
                "quantity_in"=>$quantity,
                "quantity_out"=>0
            ]);
        }
    }
}
