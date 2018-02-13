<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions=[
            ["setup-photoshop","Photoshop Permission","Add Photoshop Permission"],
            ["setup-sage","Access Sage","Access Sage URL"],
            ["setup-word","Access Word","Access Word URL"],
            ["view-all","Admin","Super User Mode"]
        ];

        foreach ($permissions as $permission){
            \App\Models\Admin\Permission::create([
                'name'=>$permission[0],
                'display_name'=>$permission[1],
                'description'=>$permission[2]
            ]);
        }
    }
}
