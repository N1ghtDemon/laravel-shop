<?php

namespace App\Http\Controllers\Products;

use App\Domain\Filter\Filter;
use App\Domain\Product\Product;

class ProductIndexController
{
    public function __invoke()
    {
        $products = Product::paginate();
        $productFilterCategory = Filter::where('type','category')->get();
        $productFilterCity = Filter::where('type','city')->get();
        return view('products.index', ['products' => $products,'categories'=>$productFilterCategory,'cities'=>$productFilterCity]);
    }
}
