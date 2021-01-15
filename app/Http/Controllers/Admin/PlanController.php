<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\Support\Str;

class PlanController extends Controller
{
    protected $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
        $this->middleware(['can:plans']);
    }

    public function index()
    {
        $plans = $this->repository->paginate();
        return view('admin.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.plans.create');
    }

    public function store(StoreUpdatePlan $request)
    {
        

        $this->repository->create($request->all());

        return redirect()->route('plans.index');
    }


    public function show($id)
    {
        if(!$plan = $this->repository->find($id));

        return view('admin.plans.show', compact('plan'));
    }

    public function edit($id)
    {
        if(!$plan = $this->repository->find($id)){

            return redirect()->back();


        }

        

        return view('admin.plans.edit', compact('plan'));

    }


    public function update(StoreUpdatePlan $request, $id)
    {

        $plan = $this->repository->find($id);

       

        if(!$plan){

            return redirect()->back();
        }

        $plan->update($request->all());
        

        return redirect()->route('plans.index');
    }

    


    public function destroy($id)
    {
        if(!$plan = $this->repository->with('details')->find($id));

        if($plan->details()->count() > 0){

            return redirect()->back()->with('error', 'Atenção, delete primeiro as caracteristicas do plano');
            
        }

        $plan->delete();


        return redirect()->route('plans.index');
    }

    public function search(Request $request)
    {
        $filters = $request->all();
        $plans = $this->repository->search($request->filter);

        return view('admin.plans.index', compact('plans', 'filters'));

    }

}
