<?php

use Illuminate\Database\Seeder;
use App\Models\Customer;
use Faker\Factory;

class CustomerSeeder extends Seeder
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
            Customer::create([
                "firstname"=>$faker->firstName,
                "other_names"=>$faker->lastName,
                "email"=>$faker->unique()->email,
                "phone"=>$faker->unique()->phoneNumber,
                "address"=>$faker->address
            ]);
        }
    }
}
