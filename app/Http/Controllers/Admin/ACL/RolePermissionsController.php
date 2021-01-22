<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RolePermissionsController extends Controller
{
    protected $role, $permission;


    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }


    public function permissions($idRole)
    {
        $role = $this->role->with('permissions')->find($idRole);

        return view('admin.roles.permissions.index', compact('role'));
    }


    public function permissionsAvailable($idRole)
    {
        if(!$role = $this->role->find($idRole)){

            return redirect()->back();
        }

        $permissions = $role->permissionsAvailable();

        return view('admin.roles.permissions.available', compact('permissions', 'role'));
    }

    public function permissionsAttach(Request $request, $idRole)
    {
        if(!$role = $this->role->find($idRole)){

            return redirect()->back();
        }

        if($request->permissions <= 0){
            return redirect()->back()->with('error', 'Você precisa selecionar ao menos uma permissão!');
        }

        $role->permissions()->attach($request->permissions);

        return redirect()->route('roles.permissions', $role->id)->with('success', 'Permissões incluidas com sucesso!');

    }

    public function permissionsDetach($idRole, $idPermission)
    {
        $role = $this->role->find($idRole);
        $permission = $this->permission->find($idPermission);


        if(!$role || !$permission){

            return redirect()->back();
        }

        $role->permissions()->detach($permission->id);

        return redirect()->route('roles.permissions', $role->id)->with('success', 'Permissões removidas com sucesso!');
    }
}
