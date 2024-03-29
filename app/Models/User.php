<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Tenant;
use App\Models\Traits\UserACLTrait;

class User extends Authenticatable
{
    use Notifiable;
    use UserACLTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'tenant_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
    * Scope a query to only users by tenant;
    *
    * @param  \Illuminate\Database\Eloquent\Builder  $query
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function scopeTenantUser(Builder $query)
    {
        return $query->where('tenant_id', auth()->user()->tenant_id);
    }
    /**
     * Tenant
     */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

     public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
            ->orWhere('email', 'LIKE', "%{$filter}%")
            ->latest()
            ->tenantUser()
            ->paginate(10);

        return $results;
    }

    /*
     * Get Permissions
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /*
     * Only role not linked with this profile
     */
    public function rolesAvailable($filter = null)
    {
        $permissions = Role::whereNotIn('id', function ($query) {
            $query->select('role_user.role_id');
            $query->from('role_user');
            $query->whereRaw("role_user.user_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter) {
            if (!empty($filter)) {
                $queryFilter->where('roles.name', 'LIKE', "%{$filter}%");
            }
        })
        ->paginate();

        return $permissions;
    }
}
