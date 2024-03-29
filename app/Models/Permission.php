<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
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
     * Get Profiles
     */
    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'permission_profile');
    }

    /*
     * Get Profiles
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permission_role');
    }

}
