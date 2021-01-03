<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePermission;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{


    protected $repository;


    public function __construct(Permission $permission)
    {
        $this->repository = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!$permissions = $this->repository->paginate()){

            return redirect()->back()->with('error', 'Houver um erro na consulta');
        }

        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePermission $request)
    {
        if(!$this->repository->create($request->all())){

            return redirect()->back();
        }

        return redirect()->route('permissions.index')->with('success', 'Permissão criada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$permission = $this->repository->find($id)){

            return redirect()->back()->with('error', 'Houver um erro na consulta');
        }

        return view('admin.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$permission = $this->repository->find($id)){

            return redirect()->back()->with('error', 'Perfil não encontrado');

        }

       

        return view('admin.permissions.edit', compact('permission'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePermission $request, $id)
    {
        if(!$permission = $this->repository->find($id)){

            return redirect()->back()->with('error', 'Perfil não encontrado');

        }

        $permission->update($request->all());

        return redirect()->route('permissions.index')->with('success', 'Permissão atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$permission = $this->repository->find($id)){

            return redirect()->back()->with('error', 'Perfil não encontrado');

        }

        $permission->delete();

        return redirect()->route('permissions.index')->with('success', 'Permissão deletada com sucesso');
    }
}
