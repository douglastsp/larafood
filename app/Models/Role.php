<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
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
}
