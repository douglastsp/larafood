<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use TenantTrait;
    
    protected $fillable = ['title', 'flag', 'price', 'description', 'picture'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /*
     * Only categories not linked with this profile
     */
    public function categoriesAvailable($filter = null)
    {
        $categories = Category::whereNotIn('categories.id', function ($query) {
            $query->select('category_product.category_id');
            $query->from('category_product');
            $query->whereRaw("category_product.product_id={$this->id}");
        })
        ->where(function ($queryFilter) use ($filter) {
            if (!empty($filter)) {
                $queryFilter->where('categories.name', 'LIKE', "%{$filter}%");
            }
        })
        ->paginate();

        return $categories;
    }

    public function search($filter = null)
    {
        $results = $this->where('title', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate(10);

        return $results;
    }
}
