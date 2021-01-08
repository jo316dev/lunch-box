<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUser;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $repository;

    public function __construct(User $user)
    {
        $this->repository = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->repository->paginate();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUser $request)
    {
        $data = $request->all();

        $data['tenant_id'] = auth()->user()->tenant_id;
        $data['password'] = bcrypt($data['password']);
        
   

        if(!$this->repository->create($data)){

            return redirect()->back()->with('error', 'Houve um problema no cadastrado');
        }

        return redirect()->route('users.index')->with('success', 'Pefil cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if(!$user = $this->repository->find($id)){

            return redirect()->back()->with('error', 'Perfil não encontrado');

        }

    

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$user = $this->repository->find($id)){

            return redirect()->back()->with('error', 'Perfil não encontrado');

        }

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUser $request, $id)
    {
        if(!$user = $this->repository->find($id)){

            return redirect()->back()->with('error', 'Perfil não encontrado');

        }

        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'Pefil atualizado com sucesso');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$user = $this->repository->find($id)){

            return redirect()->back()->with('error', 'Perfil não encontrado');

        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Pefil excluido com sucesso');

    }


    public function search(Request $request)
    {
        $filters = $request->all();
        
        if(!$users = $this->repository->search($request->filter)){

            return redirect()->back()->with('error', 'Erro na consulta');
        }

        if($users->total() == 0){
            return redirect()->back()->with('error', 'Nenhum resultado encontrado');
        }

        return view('admin.users.index', compact('users', 'filters'));
        
        
    }
}
