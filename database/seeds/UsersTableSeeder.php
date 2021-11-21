<?php

use App\Models\Tenant;
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
        //getting the user's tenant
        $tenant = Tenant::first();

        //User default
        $tenant->users()->create([
            'name' => 'Douglas Teixeira',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456')
        ]);
    }
}
