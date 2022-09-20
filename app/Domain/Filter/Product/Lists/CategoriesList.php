<?php

namespace App\Domain\Filter\Product\Lists;

use App\Domain\Filter\Filter;

class CategoriesList
{
    public static function get()
    {
        return Filter::where('type', 'category')->get();
    }
}
