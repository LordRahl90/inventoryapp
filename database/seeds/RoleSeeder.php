<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=[
            ["finance","Finance","Finance Roles"],
            ["regular","Regular","Regular Roles"],
            ["admin","Admin","Admin Roles"]
        ];


        foreach ($roles as $role){
            \App\Models\Admin\Role::create([
                'name'=>$role[0],
                'display_name'=>$role[1],
                'description'=>$role[2]
            ]);
        }
    }
}
