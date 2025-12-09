<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function __construct(
        private readonly ProductService $service
    ) {
    }

    public function index(Request $request)
    {
        return ProductResource::collection(
            $this->service->list(
                $request->input('search'),
                $request->input('sort', 'desc')
            )
        );
    }

    public function store(ProductStoreRequest $request)
    {
        return new ProductResource(
            $this->service->create($request->validated())
        );
    }
}
