<?php

namespace Modules\Author\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Author\Http\Requests\AuthorRequest;
use Modules\Author\Models\Author;
use Modules\Author\Transformers\AuthorResource;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showall()
    {

        $author = Author::paginate(10);
        return [
            'data' => AuthorResource::collection($author),
            'meta' => [
                'current_page' => $author->currentPage(),
                'last_page' => $author->lastPage(),
                'per_page' => $author->perPage(),
                'total' => $author->total(),
            ],
        ];
    }

    public function store(AuthorRequest $request)
    {
        $validatedData = $request->validated();

        $author = Author::create($validatedData);

        if ($request->hasFile('photo')) {

            $author->addMediaFromRequest('photo')->toMediaCollection('author');

        }

        return response()->json($author,201);
    }

    public function show($id)
    {
        $author = Author::query()->with('photo')->findOrFail($id);

        return new AuthorResource($author);
    }

    public function update(AuthorRequest $request, $id)
    {

        $author = Author::findOrFail($id);

        if ($request->hasFile('photo')) {

            $author->addMediaFromRequest('photo')->toMediaCollection('author');
        }

        $author->update($request->validated());

        return response()->json($author,200);
    }
}
