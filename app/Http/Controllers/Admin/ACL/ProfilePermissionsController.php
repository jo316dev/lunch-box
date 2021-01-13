<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfilePermissionsController extends Controller
{

    protected $repository, $permission;

    public function __construct(Profile $profile, Permission $permission)
    {
        $this->repository = $profile;
        $this->permission = $permission;
    }

    public function permissions($id)
    {
        $profile = $this->repository->find($id);
        $permissions = $profile->permissions()->get();
        // dd($permissions);

        return view('admin.profiles.permissions.index', compact('profile', 'permissions'));


    }


    public function permissionsAvailable($id)
    {
        if(!$profile = $this->repository->find($id)){

            return redirect()->back();
        }

        $permissions = $profile->permissionsAvailable();

  

     

        return view('admin.profiles.permissions.available', compact('profile', 'permissions'));
    }

    public function permissionsAttach(Request $request, $id)
    {
        if(!$profile = $this->repository->find($id)){

            return redirect()->back();
        }

        if($request->permissions <= 0){
            return redirect()->back()->with('error', 'Você precisa selecionar ao menos uma permissão!');
        }


        // dd(count($request->permissions));

        $profile->permissions()->attach($request->permissions);

        return redirect()->route('profile.permissions', $profile->id)->with('success', 'Permissões vinculadas com sucess');
    }


    public function detachPermissionsProfile($idPermission, $idProfile)
    {
        $profile = $this->repository->find($idProfile);
        $permission = $this->permission->find($idPermission);

        if(!$profile || !$permission){
            return redirect()->back();
        }

        $profile->permissions()->detach($permission);

        return redirect()->route('profile.permissions', $profile->id)->with('success', 'Desvinculada com sucesso');

    }

  
}
