<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Nazmul Sharif";
        $user->email = "nazmulict94@gmail.com";
        $user->user_type = "super_admin";
        $user->password = Hash::make('123456');
        $user->save();
    }
}
