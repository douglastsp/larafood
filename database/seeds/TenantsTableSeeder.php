<?php

use App\Models\Tenant;
use App\Models\Plan;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //getting the first plan
        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' => '00000000000000',
            'name' => 'DT Corporation',
            'url' => 'dtcorporation',
            'email' => 'admin@admin.com'
        ]);
    }
}
