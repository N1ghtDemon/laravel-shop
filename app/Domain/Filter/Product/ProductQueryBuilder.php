<?php

namespace App\Domain\Filter\Product;

use App\Domain\Product\Product;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

class ProductQueryBuilder
{
    private Builder $query;

    private Collection $productIds;

    public function __construct()
    {
        $this->query = \DB::table('filterables')->where('filterable_type', Product::class);
    }

    public function filtering($categoryId, $citiesIds): static
    {
        $categoryId = (isset($categoryId) && !empty($categoryId)) ? $categoryId : null;
        $citiesIds = (isset($citiesIds) && !empty($citiesIds)) ? $citiesIds : null;

        if ($categoryId && $citiesIds) $this->fullFilter($categoryId, $citiesIds);
        elseif ($categoryId) $this->filterByCategory($categoryId);
        elseif ($citiesIds) $this->filterByCities($citiesIds);
        return $this;
    }

    private function fullFilter($categoryId, $citiesIds): void
    {
        $this->filterByCategory($categoryId);
        $this->productIds = \DB::table('filterables')->whereIn('filterable_id', $this->productIds)
            ->where(function ($query) use ($citiesIds) {
                $query->whereIn('filter_id', $citiesIds);
            })
            ->get()->pluck(['filterable_id']);
    }

    private function filterByCategory($categoryId): void
    {
        $this->productIds = $this->query->where('filter_id', $categoryId)->pluck('filterable_id');
    }

    private function filterByCities($citiesIds): void
    {
        $this->productIds = $this->query->whereIn('filter_id', $citiesIds)->pluck('filterable_id');
    }

    public function getProducts()
    {
        if (isset($this->productIds) )
            return Product::whereIn('id', $this->productIds)->paginate();
        else return Product::paginate();
    }
}
