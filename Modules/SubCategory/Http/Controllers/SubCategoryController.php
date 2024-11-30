<?php

namespace Modules\SubCategory\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\SubCategory\Http\Requests\SubCategoryRequest;
use Modules\SubCategory\Models\SubCategory;
use Modules\SubCategory\Transformers\SubCategoryResource;

class SubCategoryController extends Controller
{
    public function showall()
    {
        $subcategory = SubCategory::paginate(10);
        return [
            'data' => SubCategoryResource::collection($subcategory),
            'meta' => [
                'current_page' => $subcategory->currentPage(),
                'last_page' => $subcategory->lastPage(),
                'per_page' => $subcategory->perPage(),
                'total' => $subcategory->total(),
            ],
        ];
    }

    public function store(SubCategoryRequest $request)
    {
        $validatedData = $request->validated();

        $subcategory = new SubCategory;
        $subcategory->name = $validatedData['name'];
        $subcategory->category_id = $validatedData['category_id'];
        $subcategory->save();
        return response()->json($subcategory,201);
    }

    public function show($id)
    {
        $subcategory = SubCategory::findOrFail($id);

        return new SubCategoryResource($subcategory);
    }

    public function update(SubCategoryRequest $request, $id)
    {
        $subcategory = SubCategory::find($id);

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
    ]);

    $subcategory->update($validatedData);

    return response()->json($subcategory, 200);
    }
}
