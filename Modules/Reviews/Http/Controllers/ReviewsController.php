<?php

namespace Modules\Reviews\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Reviews\Http\Requests\ReviewRequest;
use Modules\Reviews\Models\Review;
use Modules\Reviews\Transformers\ReviewResource;

class ReviewsController extends Controller
{


    public function showall()
    {
        $review = Review::paginate(5);
        return [
            'data' => ReviewResource::collection($review),
            'meta' => [
                "current_page" => $review->currentPage(),
                "last_page" => $review->lastPage(),
                "per_page" => $review->perPage(),
                "total" => $review->total()
            ],
        ];
    }



    public function store(ReviewRequest $request)
    {
        $validatedData = $request->validated();
        $review = Review::create($validatedData);

        return response()->json($review);
    }


    public function show($id)
    {
        $review = Review::findOrFail($id);

        return new ReviewResource($review);
    }



    public function update(ReviewRequest $request, $id)
    {
        $review = Review::findOrFail($id);
        $validatedData = $request->validated();

        $review->update($validatedData);
        return response()->json($review);
    }



    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return response()->json($review);
    }
}
