<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * Handle the plan "created" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function creating(Category $category)
    {
        //before create a category get the name and transform into url
        $category->url = Str::kebab($category->name);
        $category->uuid = Str::uuid();
    }

    /**
     * Handle the category "updated" event.
     *
     * @param  \App\Models\category  $category
     * @return void
     */
    public function updating(Category $category)
    {
        //before create a category get the name and transform into url
        $category->url = Str::kebab($category->name);
    }
}
