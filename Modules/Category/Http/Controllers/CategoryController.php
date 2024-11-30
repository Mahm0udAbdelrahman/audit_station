<?php

namespace Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HttpResponse;
use Illuminate\Support\Carbon;
use Modules\Category\Http\Requests\CategoryRequest;
use Modules\Category\Models\Category;
use Modules\Category\Transformers\CategoryResource;
use Modules\Course\Models\Course;

class CategoryController extends Controller
{

    use HttpResponse;

    public function showall(Request $request)
    {
        $filter = $request->query('filter');

        $category = Category::query()
            ->searchable(['position', 'type','status'])
            ->when($filter, fn($builder) => $builder->where('status', $filter));

        $category = $category->paginate(5);

        return $this->paginatedResponse($category, CategoryResource::class);
    }


    public function store(CategoryRequest $request)
{
    $validatedData = $request->validated();

    $category = new Category;
    $category->name = $validatedData['name'];

    if ($request->hasFile('photo')) {
        $category->addMediaFromRequest('photo')->toMediaCollection('photo');
    }

    $category->save();

    if ($request->hasFile('video')) {
        $category->addMediaFromRequest('video')->toMediaCollection('videos');
    }

    return response()->json($category,201);
}




    public function show($id)
    {
        $category = Category::with(['courses.videos'])->findOrFail($id);

        return response()->json([
            'id' => $category->id,
            'name' => $category->name,
            'courses' => $category->courses->map(function ($course) {
                return [
                    'id' => $course->id,
                    'course_name' => $course->course_name,
                    'instructor_name' => $course->instructor_name,
                    'price' => $course->price,
                    'percentage' => $course->percentage,
                    'videos' => $course->videos->map(function ($video) {
                        return [
                            'id' => $video->id,
                            'title' => $video->title,
                            'course_id' => $video->course_id,
                            'video_url' => $video->getFirstMediaUrl('videos') ?: asset('media/default.mp4.MP4'),
                        ];
                    }),
                ];
            }),
            'created_at' => Carbon::parse($category->created_at)->format('Y-m-d h:i:s A'),
            'updated_at' => Carbon::parse($category->updated_at)->format('Y-m-d h:i:s A'),
        ]);
    }




    private function getPhotoUrl($photo)
    {
        return $photo->first()->original_url ?? asset('media/1/58cc5138-b545-4eb5-a038-cef16e880364.jpg');
    }


    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update($request->all());

        if ($request->hasFile('photo')) {

            $category->addMediaFromRequest('photo')->toMediaCollection('photo');
        }

        return response()->json($category);
    }


    public function showCourses($categoryId)
    {

        $category = Category::find($categoryId);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        $courses = $category->courses;
        return response()->json($courses);
    }


    public function destroy($id){

        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['Message'=>'Deleted']);
    }




    public function filterSearchBlog()
    {
        $name = request('name');
        if (!$name) {
            $category = Category::with(['blogs'])->get();
            return response()->json($category);
        }
        $category = Category::with(['blogs'])->where('name', 'like', '%'. $name. '%')->get();
        return response()->json($category);
    }


    public function filterSearchCourse()
    {
        $name = request('name');
        $language = request('language');
        $price = request('price');
        $skill_level = request('skill_level');

        $query = Category::with(['courses.videos']);

        if ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        }

        $query->whereHas('courses', function ($query) use ($language, $price, $skill_level) {
            if ($language) {
                $query->where('language_id', 'like', '%' . $language . '%');
            }
            if ($price) {
                $query->where('price', 'like', '%' . $price . '%');
            }
            if ($skill_level) {
                $query->where('skill_level', 'like', '%' . $skill_level . '%');
            }
        });

        $category = $query->get();
        return response()->json($category);
    }

}
