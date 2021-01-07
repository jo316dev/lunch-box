<?php


namespace App\Services;

use App\Models\Plan;
use Illuminate\Support\Str;


class TenantService
{

    private $plan, $data = [];

    public function make(Plan $plan, array $data)
    {
        $this->plan = $plan;
        $this->data = $data;
        $tenant = $this->storeTenant();
        $user = $this->storeUser($tenant);

        return $user;
    }

  

    private function storeTenant()
    {
        return  $this->plan->tenants()->create([
            'cnpj' => $this->data['cnpj'],
            'name' => $this->data['company'],
            'url' => Str::kebab($this->data['company']),
            'email' => $this->data['email'],
            'uuid' => md5(uniqid($this->data['cnpj'])),
            'subscription' => now(),
            'expires_at' => now()->addDays(7),
        ]);
    }

    private function storeUser($tenant)
    {
        return $tenant->users()->create([
            'name' => $this->data['name'],
             'email' => $this->data['email'],
             'password' => bcrypt($this->data['password']),
        ]);
    }




}