<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    protected $user;
    protected $role;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    //
    public function index($idUser)
    {
        $user = $this->user->find($idUser);

        if (empty($user)) {
            return redirect()->back();
        }

        $roles = $user->roles()->paginate();

        return view('admin.pages.users.roles.index', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function users($idRole)
    {
        $role = $this->role->find($idRole);

        if (empty($role)) {
            return redirect()->back();
        }

        $users = $role->users()->paginate();

        return view('admin.pages.roles.users.users', [
            'users' => $users,
            'role' => $role
        ]);
    }

    public function rolesAvailable(Request $request, $idUser)
    {
        $user = $this->user->find($idUser);

        if (empty($user)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $roles = $user->rolesAvailable($request->filter);

        return view('admin.pages.users.roles.available', [
            'user' => $user,
            'roles' => $roles,
            'filters' => $filters
        ]);
    }

    public function attachRolesUser(Request $request, $idUser)
    {
        $user = $this->user->find($idUser);

        if (empty($user)) {
            return redirect()->back();
        }

        if (empty($request->roles) || count($request->roles) === 0){
            return redirect()
                ->back()
                ->with('warning', 'Não há cargos selecionadas para vincular a este perfil!');
        }

        $user->roles()->attach($request->roles);

        return redirect()->route('users.roles', $idUser)->with('message', 'Cargos vinculadas com sucesso!');
    }

    public function detachRolesUser($idUser, $idRole)
    {
        $user = $this->user->find($idUser);
        $role = $this->role->find($idRole);

        if (empty($user) || empty($role)) {
            return redirect()->back();
        }

        //Detach a permisson from user
        $user->roles()->detach($role);

        return redirect()->back()->with('message', 'Cargos desvinculado com sucesso!');
    }
}
