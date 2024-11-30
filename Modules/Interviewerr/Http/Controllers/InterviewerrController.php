<?php

namespace Modules\Interviewerr\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Modules\Auth\Enums\UserTypeEnum;
use Modules\Interviewerr\Http\Requests\InterviewerrRequest;
use Modules\Interviewerr\Models\Interviewerr;
use Modules\Interviewerr\Transformers\InterviewerrResource;

class InterviewerrController extends Controller
{

    use HttpResponse;


    public function index(Request $request){

        $filter = $request->query('filter');

        $interviewerrQuery = Interviewerr::query()
            ->searchable(['name', 'status','permission'])
            ->when($filter, fn($builder) => $builder->where('status', $filter));
            $interviewerr = $interviewerrQuery->paginate(5);

        return $this->paginatedResponse($interviewerr, InterviewerrResource::class);
    }



    public function show($id){
        $interviewerr = Interviewerr::findOrFail($id);

        return new InterviewerrResource($interviewerr);
    }



    public function store(InterviewerrRequest $request){
        $validatedData = $request->validated();

        if ($request->hasFile('certificate')) {
            $validatedData['certificate'] = $request->file('certificate')->store('certificates', 'public');
        }

        $interviewerr = Interviewerr::create($validatedData);

        return response()->json($interviewerr, 201);
    }



    public function update(InterviewerrRequest $request ,$id){
        $interviewerr = Interviewerr::findOrFail($id);
        $validatedData = $request->validated();
        if ($request->hasFile('certificate')) {
            $validatedData['certificate'] = $request->file('certificate')->store('certificates', 'public');
        }
        $interviewerr->update($validatedData);
        return response()->json($interviewerr);
    }


    public function destroy($id){
        $interviewerr = Interviewerr::findOrFail($id);
        $interviewerr->delete();

        return response()->json(['Message'=>'Deleted Succefully']);
    }



    public function downloadCertificate($id)
    {
        $interviewerr = Interviewerr::findOrFail($id);

        if ($interviewerr->certificate && Storage::disk('public')->exists($interviewerr->certificate)) {
            return response()->download(storage_path('app/public/' . $interviewerr->certificate));
        }

        return response()->json(['message' => 'Certificate not found'], 404);
    }


}
