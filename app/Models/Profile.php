<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = ['name', 'description'];

    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
            ->orWhere('description', 'LIKE', "%{$filter}%")
            ->paginate(10);

        return $results;
    }

    /*
     * Get Permissions
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_profile');
    }

    /**
     * Get Plans
     */
    public function plans()
    {
        return $this->belongsToMany(Plan::class);
    }

    /*
     * Only permission not linked with this profile
     */
    public function permissionsAvailable($filter  = null)
    {
        $permissions = Permission::whereNotIn('id', function ($query){
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter) {
            if (!empty($filter)){
                $queryFilter->where('permissions.name', 'LIKE', "%{$filter}%");
            }
        })
        ->paginate();

        return $permissions;
    }
}

