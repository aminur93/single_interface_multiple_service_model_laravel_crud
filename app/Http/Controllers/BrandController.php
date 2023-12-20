<?php

namespace App\Http\Controllers;

use App\Service\brand\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }


    public function index()
    {
        $brands = $this->brandService->index();

        return response()->json([
            'success' => true,
            'status' => 'Lists Data Brand',
            'data' => $brands
        ],200);
    }

    public function store(Request $request)
    {
        try {
            $brand = $this->brandService->create($request);

            return response()->json([
                'success' => true,
                'status' => 'Brand Created',
                'data' => $brand
            ],201);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'success' => false,
                'status' => 'Brand Failed to Save'
            ],500);
        }
    }

    public function edit($id)
    {
        try {
            $brand = $this->brandService->edit($id);

            return response()->json([
                'success' => true,
                'status' => 'Brand Edited',
                'data' => $brand
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'success' => false,
                'status' => 'Brand Failed to Edit'
            ],500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $brand = $this->brandService->update($request, $id);

            return response()->json([
                'success' => true,
                'status' => 'Brand Updated',
                'data' => $brand
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'success' => false,
                'status' => 'Brand Failed to Update'
            ],500);
        }
    }

    public function destroy($id)
    {
        try {
            $brand = $this->brandService->destroy($id);

            return response()->json([
                'success' => true,
                'status' => 'Brand Deleted',
                'data' => $brand
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'success' => false,
                'status' => 'Brand Failed to Delete'
            ],500);
        }
    }
}
