<?php

namespace App\Http\Controllers\Products;

use App\Domain\Filter\Product\Lists\CategoriesList;
use App\Domain\Filter\Product\Lists\CitiesList;
use App\Domain\Filter\Product\ProductQueryBuilder;

class ProductFilterController
{
    public function __invoke()
    {
        $categoryId = request()?->category_id;
        $cityIds = request()?->city_ids;

        $productQueryBuilder = (new ProductQueryBuilder())->filtering($categoryId,$cityIds);

        return view('products.index', ['products' => $productQueryBuilder->getProducts(), 'categories' => CategoriesList::get(), 'cities' => CitiesList::get()]);
    }
}
