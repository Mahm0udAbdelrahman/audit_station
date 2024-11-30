<?php

namespace Modules\Instructor\Http\Controllers;

use Modules\Auth\Enums\UserTypeEnum;


use App\Http\Controllers\Controller;
use App\Http\Requests\UpgradeToInstructorRequest;
use App\Traits\HttpResponse;
use Faker\Provider\Company;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Modules\Instructor\Http\Requests\InstructorRequest;
use Modules\Instructor\Models\Instructor;
use Modules\Instructor\Transformers\InstructorResource;


class InstructorController extends Controller
{
    use HttpResponse;

    public function showall(Request $request)
    {
        $filter = $request->query('filter');
        $search = $request->query('search');

        $instructorsQuery = Instructor::query()
            ->searchByRelation('user', ['full_name', 'email'])
            ->when($filter, fn($builder) => $builder->where('approval_status', $filter));

        $instructor = $instructorsQuery->paginate(5);
        return $this->paginatedResponse($instructor, InstructorResource::class);
    }

    public function store(InstructorRequest $request)
    {
        $validatedData = $request->validated();
        $instructor = Instructor::create($validatedData);
        return response()->json($instructor, 201);
    }

    public function show($id)
    {
        $instructor = Instructor::with(['courses.videos', 'experiences'])->findOrFail($id);
        return new InstructorResource($instructor);
    }

    public function update(InstructorRequest $request, $id)
    {
        $instructor = Instructor::findOrFail($id);
        $instructor->update($request->validated());
        return new InstructorResource($instructor);
    }

    public function destroy($id)
    {
        $instructor = Instructor::findOrFail($id);
        $instructor->delete();
        return response()->json(['Message' => 'Instructor Deleted Instructor']);
    }


}
