<?php

namespace Modules\Faqs\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Faqs\Http\Requests\FaqRequest;
use Modules\Faqs\Models\Faq;
use Modules\Faqs\Transformers\FaqResource;

class FaqsController extends Controller
{
    public function showall()
    {
        // return QuestionResource::collection(Question::paginate(10));

        $faq = Faq::paginate(10);
        return [
            'data' => FaqResource::collection($faq),
            'meta' => [
                'current_page' => $faq->currentPage(),
                'last_page' => $faq->lastPage(),
                'per_page' => $faq->perPage(),
                'total' => $faq->total(),
            ],
        ];
    }



    public function store(FaqRequest $request)
    {
        $validatedData = $request->validated();


        $faq = Faq::create($request->validated());

        return response()->json($faq);
    }



    public function show($id)
    {
        $faq = Faq::findOrFail($id);

        return new FaqResource($faq);
    }



    public function update(FaqRequest $request, $id)
    {
        $faq = Faq::findOrFail($id);

        $faq->update($request->validated());

        return response()->json($faq);
    }



    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);

        $faq->delete();

        return response()->json(['message' => 'Deleted Successfully']);
    }
}
