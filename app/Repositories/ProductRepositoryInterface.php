<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProductRepositoryInterface
{
    public function searchAndSort(?string $search, string $sort): LengthAwarePaginator;
    public function create(array $data): Product;
}
