<?php

namespace Modules\Instructor\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\Instructor\Http\Requests\ExperienceRequest;
use Modules\Instructor\Http\Requests\InstructorRequest;
use Modules\Instructor\Models\Experience;
use Modules\Instructor\Transformers\ExperienceResource;

class ExperienceController extends Controller
{

    use HttpResponse;

    public function showall()
    {
        $experience = Experience::paginate(5);
        return [
            'data' => ExperienceResource::collection($experience),
            'meta' => [
                'current_page' => $experience->currentPage(),
                'last_page' => $experience->lastPage(),
                'per_page' => $experience->perPage(),
                'total' => $experience->total(),
            ],
        ];
    }

    public function show($id){
        $experience = Experience::findOrFail($id);
        return new ExperienceResource($experience);
    }

    public function store(ExperienceRequest $request){
        $validatedData = $request->validated();
        $experience = Experience::create($validatedData);
        return response()->json($experience, 201);
    }

    public function update(ExperienceRequest $request,$id){
        $experience = Experience::findOrFail($id);
        $validatedData = $request->validated();
        $experience->update($validatedData);
        return response()->json($experience);

    }

    public function destroy($id){

        $experience = Experience::findOrFail($id);
        $experience->delete();
        return response()->json(['Message'=>'Deleted']);
    }
}
