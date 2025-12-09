<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository implements ProductRepositoryInterface
{
    public function searchAndSort(?string $search, string $sort): LengthAwarePaginator
    {
        return Product::query()
            ->when($search, fn($q) => $q->where('title', 'like', "%{$search}%"))
            ->orderBy('created_at', $sort)
            ->paginate(10);
    }

    public function create(array $data): Product
    {
        return Product::create($data);
    }
}
