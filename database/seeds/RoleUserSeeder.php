<?php

use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\RoleUser::create([
            "user_id"=>1,
            "role_id"=>3
        ]);

    }
}
