<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDetail;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    protected $repository, $plan;

    public function __construct(DetailPlan $details, Plan $plan)
    {
        $this->repository = $details;
        $this->plan = $plan;
    }


    public function index($id)
    {
        if(!$plan = $this->plan->find($id)){

            return redirect()->back();
        }

        $details = $plan->details()->paginate();

        return view('admin.plans.details.index', compact('plan', 'details'));
    }

    public function create($id)
    {
        if(!$plan = $this->plan->find($id)){

            return redirect()->back();
        }

        return view('admin.plans.details.create', compact('plan'));
    }

    public function store(StoreUpdateDetail $request, $id)
    {
        if(!$plan = $this->plan->find($id)){

            return redirect()->back();
        }

         $plan->details()->create($request->all());

         return redirect()->route('details.plan.index', $plan->id);
    }

    public function edit($id, $idDetail)
    {
        if(!$plan = $this->plan->find($id)){

            return redirect()->back();
        }

        $detail = $plan->details()->find($idDetail);

        return view('admin.plans.details.edit', compact('plan', 'detail'));
    }

    public function update(StoreUpdateDetail $request, $id, $idDetail)
    {
       $plan = $this->plan->find($id);
       $detail = $this->repository->find($idDetail);

       if(!$detail || !$plan){
           return redirect()->back();
       }

       $detail->update($request->all());

       return redirect()->route('details.plan.index', $plan->id);


    }

    public function destroy($id, $idDetail)
    {
        $plan = $this->plan->find($id);
       $detail = $this->repository->find($idDetail);

       if(!$detail || !$plan){
           return redirect()->back();

        
       }

       $detail->delete();

       return redirect()->route('details.plan.index', $plan->id);
    }

    public function search(Request $request, $id)
    {
        $plan = Plan::find($id);
      
        $details = $this->repository->search($request->name);

        return view('admin.plans.details.index', compact('details', 'plan'));
    }
}
