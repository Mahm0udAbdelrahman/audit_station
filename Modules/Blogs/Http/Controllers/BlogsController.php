<?php

namespace Modules\Blogs\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Modules\Blogs\Http\Requests\BlogsRequest;
use Modules\Blogs\Models\Blog;
use Modules\Blogs\Transformers\BlogsResource;

class BlogsController extends Controller
{
    use HttpResponse;

    public function showall(Request $request)
    {
        $filter = $request->query('filter');

        $blogQuery = Blog::query()
            ->with(['photo', 'comments'])
            ->searchable(['name', 'status'])
            ->when($filter, fn($builder) => $builder->where('status', $filter));

        $blogs = $blogQuery->paginate(9);

        return $this->paginatedResponse($blogs, BlogsResource::class);
    }


    public function show($id)
    {
        $blog = Blog::query()->with(['comments', 'photo'])->findOrFail($id);
        return new BlogsResource($blog);
    }


    public function store(BlogsRequest $request)
    {
        $validatedData = $request->validated();

        $blog = Blog::create($validatedData);

        if ($request->hasFile('photo')) {

            $blog->addMediaFromRequest('photo')->toMediaCollection('photo');
        }

        return response()->json($blog, 201);
    }

    public function update(BlogsRequest $request, $id)
    {
        $validateData = $request->validated();
        $blog = Blog::findOrFail($id);
        $blog->update($validateData);

        if ($request->hasFile('photo')) {

            $blog->addMediaFromRequest('photo')->toMediaCollection('photo');
        }

        return response()->json($blog, 200);
    }


    public function destroy($id = null)
    {
        Blog::destroy($id);
        return response()->json(['message' => 'Blogs deleted successfully.'], 200);
    }
}
