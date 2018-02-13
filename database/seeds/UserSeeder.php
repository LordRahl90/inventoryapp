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
        \App\Models\User::create([
            'username'=>'lordrahl',
            'password'=>\Illuminate\Support\Facades\Hash::make('fabregas'),
            'surname'=>'Alugbin',
            'other_names'=>'Abiodun Olutola',
            'email'=>'tolaabbey009@gmail.com',
            'phone'=>'07033304280'
        ]);
    }
}
