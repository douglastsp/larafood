<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateRole;
use App\Models\Role;

class RoleController extends Controller
{
    protected $repository;

    public function __construct(Role $role)
    {
        $this->repository = $role;
        $this->middleware(['can:Roles']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->repository->paginate();

        return view('admin.pages.roles.index', [
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateRole $request)
    {
        //
        $this->repository->create($request->all());

        return redirect()->route('roles.index')->with('message', 'Perfil criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $role = $this->repository->find($id);

        return view('admin.pages.roles.show', [
           'role' => $role
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $role = $this->repository->find($id);

        if (empty($role))
            return redirect()->back();

        return view('admin.pages.roles.edit', [
           'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateRole $request, $id)
    {
        //
        $role = $this->repository->find($id);

        if (empty($role))
            return redirect()->back();

        $role->update($request->all());

        return redirect()->route('roles.show', $role->id)->with('message', 'Perfil alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $role = $this->repository->find($id);

        if (empty($role))
            return redirect()->back();

        $role->delete();
        return redirect()->route('roles.index')->with('message', 'Perfil deletado com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $roles = $this->repository->search($request->filter);

        return view('admin.pages.roles.index', [
            'roles' => $roles,
            'filters' =>$filters
        ]);
    }
}
