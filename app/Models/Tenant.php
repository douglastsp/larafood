<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Tenant extends Model
{
    protected $fillable = [
        'cnpj',
        'name',
        'url',
        'email',
        'logo',
        'active',
        'subscription',
        'expires_at',
        'subscription_id',
        'subscription_active',
        'subscription_suspended'
    ];

    //Getting the Tentant's users
    public function users()
    {
        return $this->hasMany(User::class);
    }

    //getting the plan that tenant was added
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('email', 'LIKE', "%{$filter}%")
                        ->paginate(10);

        return $results;
    }
}
