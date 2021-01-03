<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'description'];


    public function search($filters = null)
    {
        $result = $this->searchQuery($filters);
        return $result;
    }


    private function searchQuery($filters = null)
    {
        $results = $this->where('name', 'LIKE', "%{$filters}%")
                            ->orWhere('description', 'LIKE', "%{$filters}%")
                            ->paginate();
        return $results;
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function plans()
    {
        return $this->belongsToMany(Plan::class);
    }


    /**
     * Permissiones disponivies
     */

    public function permissionsAvailable()
    {
        $permissions = Permission::whereNotIn('id', function($query){
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id={$this->id}");

        })->get();


        return $permissions;
    }


}
