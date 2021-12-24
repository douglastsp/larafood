<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{
    protected $profile;
    protected $permission;

    public function __construct(Profile $profile, Permission $permission)
    {
        $this->profile = $profile;
        $this->permission = $permission;
    }

    //
    public function index($idProfile)
    {
        $profile = $this->profile->find($idProfile);

        if (empty($profile)) {
            return redirect()->back();
        }

        $permissions = $profile->permissions()->paginate();

        return view('admin.pages.profiles.permissions.index', [
            'profile' => $profile,
            'permissions' => $permissions
        ]);
    }

    public function profiles($idPermission)
    {
        $permission = $this->permission->find($idPermission);

        if (empty($permission)) {
            return redirect()->back();
        }

        $profiles = $permission->profiles()->paginate();

        return view('admin.pages.permissions.profiles.profiles', [
            'profiles' => $profiles,
            'permission' => $permission
        ]);
    }

    public function permissionsAvailable(Request $request, $idProfile)
    {
        $profile = $this->profile->find($idProfile);

        if (empty($profile)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $permissions = $profile->permissionsAvailable($request->filter);

        return view('admin.pages.profiles.permissions.available', [
            'profile' => $profile,
            'permissions' => $permissions,
            'filters' => $filters
        ]);
    }

    public function attachPermissionsProfile(Request $request, $idProfile)
    {
        $profile = $this->profile->find($idProfile);

        if (empty($profile)) {
            return redirect()->back();
        }

        if (empty($request->permissions) || count($request->permissions) === 0){
            return redirect()
                ->back()
                ->with('warning', 'Não há permissões selecionadas para vincular a este perfil!');
        }

        $profile->permissions()->attach($request->permissions);

        return redirect()->route('profiles.permissions', $idProfile)->with('message', 'Permissões vinculadas com sucesso!');
    }

    public function detachPermissionsProfile($idProfile, $idPermission)
    {
        $profile = $this->profile->find($idProfile);
        $permission = $this->permission->find($idPermission);

        if (empty($profile) || empty($permission)) {
            return redirect()->back();
        }

        //Detach a permisson from profile
        $profile->permissions()->detach($permission);

        return redirect()->back()->with('message', 'Desvinculado com sucesso!');
    }
}
