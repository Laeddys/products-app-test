<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function __construct(
        private readonly ProductService $service
    ) {
    }

    public function index(Request $request)
    {
        $products = $this->service->list(
            $request->input('search'),
            $request->input('sort', 'desc')
        );

        return view('products.index', compact('products'));
    }

    public function store(ProductStoreRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->back()->with('success', 'Product created!');
    }
}
