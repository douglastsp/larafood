<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    //Fillable
    protected $fillable = ['name', 'url', 'price', 'description'];

    public function details()
    {
        //relationship one to many
        return $this->hasMany(DetailPlan::class);
    }

    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate(10);

        return $results;
    }
}
