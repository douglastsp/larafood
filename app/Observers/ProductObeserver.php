<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductObeserver
{
    /**
     * Handle the product "creating" event.
     *
     * @param  \App\Models\Product  $category
     * @return void
     */
    public function creating(Product $product)
    {
        //before create a product get the name and transform into flag
        $product->flag = Str::kebab($product->title);
        $product->uuid = Str::uuid();
    }

    /**
     * Handle the product "updating" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updating(Product $product)
    {
        //before create a product get the name and transform into flag
        $product->flag = Str::kebab($product->title);
    }
}
