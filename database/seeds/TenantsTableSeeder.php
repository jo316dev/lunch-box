<?php

use App\Models\Plan;
use App\Models\Tenant;
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
        $plan = Plan::first();

        $plan->tenants()->create([
            'uuid' =>md5(uniqid($plan->id)),
            'cnpj' => '7777777', 
            'name' => 'Restaurante Tester', 
            'url'   => 'tester', 
            'email' => 'teste@teste.com'
        ]);
        
    }
}
