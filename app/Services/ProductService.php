<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;


class ProductService
{
    public function __construct(
        private readonly ProductRepositoryInterface $repo
    ) {
    }

    public function list(?string $search, string $sort)
    {
        return $this->repo->searchAndSort($search, $sort);
    }

    public function create(array $data): Product
    {
        return $this->repo->create($data);
    }
}
