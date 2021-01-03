<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;

class PlanProfilesController extends Controller
{

    protected $repository, $profile;

    public function __construct(Plan $plan, Profile $profile)
    {
        $this->repository = $plan;
        $this->profile = $profile;
    }


    public function profiles($id)
    {
        $plan  = $this->repository->find($id);

        $profiles = $plan->profiles()->paginate();

        if(!$plan || !$profiles){
            
            return redirect()->back();
        }

        return view('admin.plans.profiles.index', compact('plan', 'profiles'));
    }


    public function profilesAvailable($id)
    {
        if(!$plan = $this->repository->find($id)){

            return redirect()->back();
        }

        $profiles = $plan->profilesAvailable();


        return view('admin.plans.profiles.available', compact('plan', 'profiles'));

    }

    public function  profilesAttach(Request $request, $id)
    {
        if(!$plan = $this->repository->find($id)){

            return redirect()->back();
        }

        if($request->profiles == 0 || !$request->profiles){

            return redirect()->back()->with('error', 'Você deve escolher no minimo um perfil!');

        }

        $plan->profiles()->attach($request->profiles);

        return redirect()->route('plan.profiles', $plan->id)->with('success', 'Perfis adicionados com sucesso!');
    }

    public function profilesDetach($id, $idProfile)
    {
        $plan = $this->repository->find($id);
        $profile = $this->profile->find($idProfile);


        if(!$plan && !$profile){

            return redirect()->back();
        }

        $plan->profiles()->detach($profile);

        return redirect()->back()->with('success', 'Perfil removido som sucesso');
    }



}
