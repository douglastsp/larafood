<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User default
        User::create([
            'name' => 'Douglas Teixeira',
            'email' => 'douglastsp@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}