<?php

namespace Modules\JobOffer\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\JobOffer\Models\JobOffer;
use App\Traits\HttpResponse;
use Modules\JobOffer\Http\Requests\JobOfferRequest;
use Modules\JobOffer\Transformers\JobOfferResource;

class JobOfferController extends Controller
{
    use HttpResponse;


    public function showall(Request $request){

        $filter = $request->query('filter');

        $jobOffersQuery = JobOffer::query()
            ->searchable(['position', 'type','status'])
            ->when($filter, fn($builder) => $builder->where('status', $filter));

        $jobOffers = $jobOffersQuery->paginate(10);

        return $this->paginatedResponse($jobOffers, JobOfferResource::class);
    }



    public function store(JobOfferRequest $request){

        $jobOffer = JobOffer::create($request->validated());

        return new JobOfferResource($jobOffer);
    }


    public function show($id){
        $jobOffer = JobOffer::query()->with('company','certificates')->findOrFail($id);

        return new JobOfferResource($jobOffer);
    }


    public function update(JobOfferRequest $request,$id){

        $jobOffer = JobOffer::findOrFail($id);

        $jobOffer->update($request->validated());

        return new JobOfferResource($jobOffer);
    }


    public function destroy($id){

        $jobOffer = JobOffer::findOrFail($id);
        $jobOffer->delete();
        return response()->json(['Message'=>'Deleted Succssfully']);
    }

    public function toggleFavorite($id)
    {
        $jobOffer = JobOffer::findOrFail($id);

        $jobOffer->is_favorite = !$jobOffer->is_favorite;

        $jobOffer->save();

        return redirect()->back()->with('success', 'تم تحديث المفضلة بنجاح.');
    }



    public function filterSearchJob()
    {
        $country = request('country');
        $salary = request('salary');
        $experience = request('experience');
        $date = request('date');
        $type = request('type');
        $certifide = request('certificates');

        $query = JobOffer::with(['company.certificates']);
        if ($country) {
            $query->where('country', 'like', '%' . $country . '%');
        }

        if ($salary) {
            $query->where('salary', '>=', $salary);
        }

        if ($experience) {
            $query->where('experience', '>=', $experience);
        }

        if ($date) {
            $query->whereDate('date', '=', $date);
        }

        if ($type) {
            $query->where('type', 'like', '%' . $type . '%');
        }

        if ($certifide) {
            $query->whereHas('certificates', function($query) use ($certifide) {
                $query->where('status', $certifide);
            });
        }

        $query = $query->get();

        return response()->json($query);
    }



}
