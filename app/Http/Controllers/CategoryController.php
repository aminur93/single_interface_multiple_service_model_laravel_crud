<?php

namespace App\Http\Controllers;

use App\Repository\Crud\CrudInterface;
use App\Service\category\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->index();

        return response()->json([
            'success' => true,
            'message' => 'List Data Category',
            'data'    => $categories
        ], 200);
    }

    public function store(Request $request)
    {
        try {

            $category = $this->categoryService->create($request);

            return response()->json([
                'success' => true,
                'message' => 'Category Created',
                'data'    => $category
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'success' => false,
                'message' => 'Category Failed to Save',
            ], 500);
        }
       
    }

    public function edit($id)
    {
        try {

            $category = $this->categoryService->edit($id);

            return response()->json([
                'success' => true,
                'message' => 'Category Edit',
                'data'    => $category
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'success' => false,
                'message' => 'Category Failed to Edit',
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {

            $category = $this->categoryService->update($request, $id);

            return response()->json([
                'success' => true,
                'message' => 'Category Updated',
                'data'    => $category
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'success' => false,
                'message' => 'Category Failed to Update',
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {

            $category = $this->categoryService->destroy($id);

            return response()->json([
                'success' => true,
                'message' => 'Category Deleted',
                'data'    => $category
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'success' => false,
                'message' => 'Category Failed to Delete',
            ], 500);
        }
    }
}
