<?php

namespace Modules\Interviewerr\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Modules\Interviewerr\Http\Requests\AvailabilityRequest;
use Modules\Interviewerr\Http\Requests\UpdateAvailabilityRequest;
use Modules\Interviewerr\Models\Availability;
use Modules\Interviewerr\Transformers\AvailabilityResource;

class AvailabilityController extends Controller
{
    use HttpResponse;

    public function showall(Request $request){
        $filter = $request->query('filter');

        $availabilityQuery = Availability::query()
            ->searchable(['to_job', 'from_time','type'])
            ->when($filter, fn($builder) => $builder->where('status', $filter));
            $availability = $availabilityQuery->paginate(5);

        return $this->paginatedResponse($availability, AvailabilityResource::class);
    }


    public function show($id){

        $availability = Availability::findOrFail($id);
        return new AvailabilityResource($availability);
    }

    public function store(AvailabilityRequest $request){
        $validatedData = $request->validated();
        $availability = Availability::create($validatedData);
        return response()->json($availability, 201);
    }

    public function update(UpdateAvailabilityRequest $request,$id){
       $availability = Availability::findOrFail($id);
       $validatedData = $request->validated();
       $availability->update($validatedData);
       return response()->json($availability,200);
    }

    public function destroy($id){
        $availability = Availability::findOrFail($id);
        $availability->delete();
        return response()->json(['Message'=>'تم الغاء المقابله']);
    }
}
