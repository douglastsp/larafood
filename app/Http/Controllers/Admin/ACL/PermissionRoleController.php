<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionRoleController extends Controller
{
    protected $role;
    protected $permission;

    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    //
    public function index($idRole)
    {
        $role = $this->role->find($idRole);

        if (empty($role)) {
            return redirect()->back();
        }

        $permissions = $role->permissions()->paginate();

        return view('admin.pages.roles.permissions.index', [
            'role' => $role,
            'permissions' => $permissions
        ]);
    }

    public function roles($idPermission)
    {
        $permission = $this->permission->find($idPermission);

        if (empty($permission)) {
            return redirect()->back();
        }

        $roles = $permission->roles()->paginate();

        return view('admin.pages.permissions.roles.roles', [
            'roles' => $roles,
            'permission' => $permission
        ]);
    }

    public function permissionsAvailable(Request $request, $idRole)
    {
        $role = $this->role->find($idRole);

        if (empty($role)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $permissions = $role->permissionsAvailable($request->filter);

        return view('admin.pages.roles.permissions.available', [
            'role' => $role,
            'permissions' => $permissions,
            'filters' => $filters
        ]);
    }

    public function attachPermissionsRole(Request $request, $idRole)
    {
        $role = $this->role->find($idRole);

        if (empty($role)) {
            return redirect()->back();
        }

        if (empty($request->permissions) || count($request->permissions) === 0){
            return redirect()
                ->back()
                ->with('warning', 'Não há cargos selecionadas para vincular a este perfil!');
        }

        $role->permissions()->attach($request->permissions);

        return redirect()->route('roles.permissions', $idRole)->with('message', 'Cargos vinculadas com sucesso!');
    }

    public function detachPermissionsRole($idRole, $idPermission)
    {
        $role = $this->role->find($idRole);
        $permission = $this->permission->find($idPermission);

        if (empty($role) || empty($permission)) {
            return redirect()->back();
        }

        //Detach a permisson from role
        $role->permissions()->detach($permission);

        return redirect()->back()->with('message', 'Cargos desvinculado com sucesso!');
    }
}
