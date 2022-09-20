<?php

namespace App\Domain\Filter\Product\Lists;

use App\Domain\Filter\Filter;

class CitiesList
{
public static function get(){
    return Filter::where('type','city')->get();
}
}
