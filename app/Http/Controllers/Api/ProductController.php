<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\Product\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private readonly ProductRepositoryInterface $repository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('per_page')) {
            $data = $this->repository->paginate($request->all(), $request->input('per_page'));
        } else {
            $data = $this->repository->all($request->all());
        }
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->repository->store($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product = $this->repository->find($product->id);

        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $this->repository->update($product, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->repository->delete($product);
    }

    public function toggleStatus(Product $product)
    {
        $this->repository->toggle($product);
    }
}
