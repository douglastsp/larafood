<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Profile;
use App\Models\Tenant;

class Plan extends Model
{
    //Fillable
    protected $fillable = ['name', 'url', 'price', 'description'];

    public function details()
    {
        //relationship one to many
        return $this->hasMany(DetailPlan::class);
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    //Getting all the tenants of the plan
    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }

    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate(10);

        return $results;
    }

     /*
     * Only Profiles not linked with this Plan
     */
    public function profilesAvailable($filter = null)
    {
        $profiles = Profile::whereNotIn('id', function ($query) {
            $query->select('plan_profile.profile_id');
            $query->from('plan_profile');
            $query->whereRaw("plan_profile.plan_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter) {
            if (!empty($filter)) {
                $queryFilter->where('profiles.name', 'LIKE', "%{$filter}%");
            }
        })
        ->paginate();

        return $profiles;
    }
}
