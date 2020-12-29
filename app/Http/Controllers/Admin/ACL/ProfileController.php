<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProfile;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    protected $repository;

    public function __construct(Profile $profile)
    {
        $this->repository = $profile;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = $this->repository->paginate();

        return view('admin.profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProfile $request)
    {

        if(!$this->repository->create($request->all())){

            return redirect()->back()->with('error', 'Houve um problema no cadastrado');
        }

        return redirect()->route('profiles.index')->with('success', 'Pefil cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$profile = $this->repository->find($id)){

            return redirect()->back()->with('error', 'Perfil não encontrado');

        }

        return view('admin.profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$profile = $this->repository->find($id)){

            return redirect()->back()->with('error', 'Perfil não encontrado');

        }

        return view('admin.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProfile $request, $id)
    {
        if(!$profile = $this->repository->find($id)){

            return redirect()->back()->with('error', 'Perfil não encontrado');

        }

        $profile->update($request->all());

        return redirect()->route('profiles.index')->with('success', 'Pefil atualizado com sucesso');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$profile = $this->repository->find($id)){

            return redirect()->back()->with('error', 'Perfil não encontrado');

        }

        $profile->delete();

        return redirect()->route('profiles.index')->with('success', 'Pefil excluido com sucesso');

    }


    public function search(Request $request)
    {
        $filters = $request->all();
        
        if(!$profiles = $this->repository->search($request->filter)){

            return redirect()->back()->with('error', 'Erro na consulta');
        }

        if($profiles->total() == 0){
            return redirect()->back()->with('error', 'Nenhum resultado encontrado');
        }

        return view('admin.profiles.index', compact('profiles', 'filters'));
        
        
    }
}
