<?php

namespace App\Models\Traits;


trait UserACLTrait
{

    private function permissions()
    {
        $tenant = $this->tenant()->first();

        $plan = $tenant->plan()->first();

        $permissions = [];

        foreach($plan->profiles as $profile){
            foreach($profile->permissions as $permission){
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