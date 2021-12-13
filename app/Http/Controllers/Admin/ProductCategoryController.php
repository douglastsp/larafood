<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    protected $product;
    protected $category;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    //
    public function index($idProduct)
    {
        $product = $this->product->find($idProduct);

        if (empty($product)) {
            return redirect()->back();
        }

        $categories = $product->categories()->paginate() ;

        return view('admin.pages.products.categories.index', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function products($idCategory)
    {
        $category = $this->category->find($idCategory);

        if (empty($category)) {
            return redirect()->back();
        }

        $products = $category->products()->paginate();

        return view('admin.pages.categories.products.products', [
            'products' => $products,
            'category' => $category
        ]);
    }

    public function categoriesAvailable(Request $request, $idProduct)
    {
        $product = $this->product->find($idProduct);

        if (empty($product)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $categories = $product->categoriesAvailable($request->filter);

        return view('admin.pages.products.categories.available', [
            'product' => $product,
            'categories' => $categories,
            'filters' => $filters
        ]);
    }

    public function attachCategoriesProduct(Request $request, $idProduct)
    {
        $product = $this->product->find($idProduct);

        if (empty($product)) {
            return redirect()->back();
        }

        if (empty($request->categories) || count($request->categories) === 0) {
            return redirect()
                ->back()
                ->with('warning', 'Não há categories selecionadas para vincular a este produto!');
        }
        //dd($request->categorys);
        $product->categories()->attach($request->categories);

        return redirect()->route('products.categories', $idProduct)
                            ->with('message', 'Categorias vinculadas com sucesso!');
    }

    public function detachCategoriesProduct($idProduct, $idCategory)
    {
        $product = $this->product->find($idProduct);
        $category = $this->category->find($idCategory);

        if (empty($product) || empty($category)) {
            return redirect()->back();
        }

        //Detach a permisson from product
        $product->categories()->detach($category);

        return redirect()->back()->with('message', 'Desvinculado com sucesso!');
    }
}
