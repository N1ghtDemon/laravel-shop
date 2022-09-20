<?php

namespace App\Domain\Filter;

use App\Domain\Product\Price;
use App\Domain\Product\Product;
use Database\Factories\ProductFilterFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;
    protected $casts = [];

    protected static function newFactory(): ProductFilterFactory
    {
        return new ProductFilterFactory();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): Price
    {
        return $this->type;
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'filterable');
    }
}
