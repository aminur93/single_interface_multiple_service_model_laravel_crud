<?php

namespace App\Http\Controllers;

use App\Service\product\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->index();

        return response()->json([
            'success' => true,
            'message' => 'Product List',
            'products' => $products
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            $product = $this->productService->create($request);

            return response()->json([
                'success' => true,
                'message' => 'Product Stored',
                'product' => $product
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Product Not Stored',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        try {
            $product = $this->productService->edit($id);

            return response()->json([
                'success' => true,
                'message' => 'Product Edit',
                'product' => $product
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Product Not Edit',
                'error' => $th->getMessage()
            ], 500);
        }
       
    }

    public function update(Request $request, $id)
    {
        try {
            $product = $this->productService->update($request, $id);

            return response()->json([
                'success' => true,
                'message' => 'Product Updated',
                'product' => $product
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Product Not Updated',
                'error' => $th->getMessage()
            ], 500);
        }
    }   

    public function destroy($id)
    {
        try {
            $product = $this->productService->destroy($id);

            return response()->json([
                'success' => true,
                'message' => 'Product Deleted',
                'product' => $product
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Product Not Deleted',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
