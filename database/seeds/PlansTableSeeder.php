<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Admini',
            'url' => 'adm',
            'price' => 999.99,
            'description' => 'Plano Teste',
        ]);
    }
}
