<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users=[
            [
                "username"=>"regular",
                "password"=>"regular1234",
                "surname"=>"Regular",
                "other_names"=>"Regular User",
                "email"=>"regular@user.com",
                "phone"=>"123455"
            ],
            [
                "username"=>"finance",
                "password"=>"finance1234",
                "surname"=>"Finance",
                "other_names"=>"Finance User",
                "email"=>"finance@user.com",
                "phone"=>"123455"
            ],

            [
                "username"=>"admin",
                "password"=>"admin1234",
                "surname"=>"Admin",
                "other_names"=>"Admin User",
                "email"=>"admin@user.com",
                "phone"=>"123455"
            ]
        ];

        foreach ($users as $user){
            \App\Models\User::create([
                'username'=>$user["username"],
                'password'=>\Illuminate\Support\Facades\Hash::make($user["password"]),
                'surname'=>$user["surname"],
                'other_names'=>$user["other_names"],
                'email'=>$user["email"],
                'phone'=>$user["phone"]
            ]);
        }
    }
}
