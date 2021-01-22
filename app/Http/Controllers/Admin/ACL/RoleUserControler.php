<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleUserControler extends Controller
{
    private $role, $user;

    public function __construct(Role $role, User $user)
    {
        $this->role = $role;
        $this->user = $user;
        $this->middleware('can:roles');
    }


    public function roles($id)
    {
        $user = $this->user->with('roles')->find($id);

        return view('admin.users.roles.index', compact('user'));
    }


    public function rolesAvailable($id)
    {
        if(!$user = $this->user->find($id)){

            return redirect()->back();
        }

        $roles = $user->roleAvailable();


        return view('admin.users.roles.available', compact('user', 'roles'));
    }

    public function rolesAttach(Request $request, $id)
    {
        if(!$user = $this->user->find($id)){

            return redirect()->back();
        }

        if($request->roles <= 0){
            return redirect()->back()->with('error', 'Você precisa selecionar ao menos uma permissão!');
        }

        $user->roles()->attach($request->roles);

        return redirect()->route('users.roles', $user->id)->with('success', 'Cargos incluidos com sucesso!');

    }

    public function rolesDetach($id, $idRole)
    {
        $role = $this->role->find($idRole);
        $user = $this->user->find($id);


        if(!$role || !$user){

            return redirect()->back();
        }

        $user->roles()->detach($role->id);

        return redirect()->route('users.roles', $user->id)->with('success', 'Cargos removidos com sucesso!');
    }
}
