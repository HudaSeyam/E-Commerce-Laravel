<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email'=> 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('123456789'),
        ]);
    }
}
