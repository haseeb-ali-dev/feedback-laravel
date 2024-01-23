<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        return response()->json([
            'status' => 'success',
            'data'   => $categories,
        ], JsonResponse::HTTP_OK);

    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());

        return response()->json([
            'status'  => 'success',
            'message' => 'Category created successfully',
            'data'    => $category,
        ], JsonResponse::HTTP_OK);
    }


    public function update(CategoryRequest $request, $id)
    {

        $category = $this->category_exists($id);

        $category->update($request->validated());

        return response()->json([
            'status'  => 'success',
            'message' => 'Category updated successfully',
            'data'    => $category,
        ]);
    }


    public function destroy($id)
    {
        $category = $this->category_exists($id);

        $category->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Category deleted successfully',
        ]);
    }

    protected function category_exists($id)
    {
        $category = Category::find($id);

        if (!isset($category))
        {
            abort(
                response()->json([
                    'status'  => 'error',
                    'message' => 'No such category found',
                ], JsonResponse::HTTP_NOT_FOUND)
            );
        }

        return $category;
    }
}
