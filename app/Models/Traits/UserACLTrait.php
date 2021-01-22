<?php

namespace App\Models\Traits;

use App\Models\Tenant;

trait UserACLTrait
{

    /**
     * Devolve as permissões efetivas do usuário cruzando
     * cruzando plano com cargos no in array
     * 
     */

    public function permissions(): array
    {
        // dd($this->permissionsPlan());
        $permissionsPlan = $this->permissionsPlan();
        $permissionsRole = $this->permissionRole();

        
        $permissions = [];

        foreach($permissionsRole as $permission){
            /**
             * Se a permissão estiver no plan, vai 
             * incluir no permissions
             */
            if(in_array($permission, $permissionsPlan)){

                array_push($permissions, $permission);
            }
        }

        return $permissions;

    }

    /**
     * Permissões do plano
     */

    private function permissionsPlan(): array
    {
        // $tenant = $this->tenant()->first()

        $tenant = Tenant::with('plan.profiles.permissions')->where('id', $this->tenant_id)->first();
        
        $plan = $tenant->plan;

        

        $permissions = [];

        foreach($plan->profiles as $profile){
            foreach($profile->permissions as $permission){
                array_push($permissions, $permission->name);
            }
        }

        // dd($permissions);

        return $permissions;  
    }

    /**
     * Retorna as permissões do cargo
     */

    private function permissionRole(): array
    {
        $roles = $this->roles()->with('permissions')->get();

        $permissions = [];

        foreach($roles as $role){
            foreach($role->permissions as $permission){

                array_push($permissions, $permission->name);
            }
        }

       

        return $permissions;
    }

    public function hasPermission(String $permissionName): bool
    {
        return in_array($permissionName, $this->permissions());
    }


    public function isAdmin(): bool
    {
        return in_array($this->email, config('acl.admins'));
    }

    


}