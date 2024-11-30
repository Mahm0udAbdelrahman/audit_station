<?php

namespace Modules\Course\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Modules\Comments\Transformers\CommentResource;
use Modules\Course\Http\Requests\CourseRequest;
use Modules\Course\Models\Course;
use Modules\Course\Transformers\CourseResource;
use Modules\Videos\Models\Video;

class CoursesController extends Controller
{


    public function showall()
    {
        $course = Course::paginate(5);

        return response()->json([
            'data' => CourseResource::collection($course),
            'meta' => [
                'current_page' => $course->currentPage(),
                'last_page' => $course->lastPage(),
                'per_page' => $course->perPage(),
                'total' => $course->total(),
            ],
        ]);
    }



    public function store(CourseRequest $request)
    {
        $validatedData = $request->validated();

        $course = Course::create($validatedData);

        return response()->json($course,201);
    }

    public function show($id)
    {
        $course = Course::with(['videos.photo', 'comments.author.photo'])->find($id);

      return new CourseResource($course);
    }



    public function update(CourseRequest $request, $id)
    {
        $course = Course::findOrFail($id);

        $validatedData = $request->validated();

        $course->update($validatedData);

        return response()->json($course,200);
    }


    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        $course->delete();

        return response()->json(['Message','Course Deleted Successfully']);
    }

}
