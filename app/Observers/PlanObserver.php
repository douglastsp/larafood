<?php

namespace App\Observers;

use App\Models\Plan;
use Illuminate\Support\Str;

class PlanObserver
{
    /**
     * Handle the plan "created" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */
    public function creating(Plan $plan)
    {
        //before create a plan get the name and transform into url
        $plan->url = Str::kebab($plan->name);
    }

    /**
     * Handle the plan "updated" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */
    public function updating(Plan $plan)
    {
        //before create a plan get the name and transform into url
        $plan->url = Str::kebab($plan->name);
    }


}
