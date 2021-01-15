<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTenant;
use App\Models\Tenant;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TenantController extends Controller
{
    private $repository;

    public function __construct(Tenant $tenant)
    {
        $this->repository = $tenant;
    }


    public function index()
    {
        $tenants = $this->repository->paginate();

        return view('admin.tenants.index', compact('tenants'));
    }

    public function create()
    {
        return view('admin.tenants.create');
    }


    public function store(StoreUpdateTenant $request)
    {
        $data = $request->all();

        $tenant = auth()->user()->tenant;

        if($request->hasFile('logo') && $request->logo->isValid()){

            $data['logo'] = $request->logo->store("tenants/{$tenant->uuid}");
        }

        $this->repository->create($data);

        return redirect()->route('tenants.index');
    }


    public function show($id)
    {
        if(!$tenant = $this->repository->find($id)){

            return redirect()->back();
        }

        return view('admin.tenants.show', compact('tenant'));
    }


    public function edit($id)
    {
        if(!$tenant = $this->repository->find($id)){

            return redirect()->back();
        }

        

        return view('admin.tenants.edit', compact('tenant'));
    }

    public function update(StoreUpdateTenant $request, $id)
    {
        if (!$tenant = $this->repository->find($id)) {
            return redirect()->back();
        }

        $data = $request->all();

        if ($request->hasFile('logo') && $request->logo->isValid()) {

            if (Storage::exists($tenant->logo)) {
                Storage::delete($tenant->logo);
            }

            $data['logo'] = $request->logo->store("tenants/{$tenant->uuid}");
        }

        $tenant->update($data);

        return redirect()->route('tenants.index');
    }

    public function destroy($id)
    {
        if (!$tenant = $this->repository->find($id)) {
            return redirect()->back();
        }

        if (Storage::exists($tenant->logo)) {
            Storage::delete($tenant->logo);
        }

        $tenant->delete();

        return redirect()->route('tenants.index');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $tenants = $this->tenant
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->where('name', $request->filter);
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('admin.pages.tenants.index', compact('tenants', 'filters'));
    }






}
