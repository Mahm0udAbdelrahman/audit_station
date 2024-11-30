<?php

namespace Modules\Ads\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Modules\Ads\Http\Requests\AdRequest;
use Modules\Ads\Models\Ad;
use Modules\Ads\Transformers\AdResource;

class AdsController extends Controller
{

    public function showall()
    {
        $ad = Ad::paginate(10);
        return [
            'data' => AdResource::collection($ad),
            'meta' => [
                'current_page' => $ad->currentPage(),
                'last_page' => $ad->lastPage(),
                'per_page' => $ad->perPage(),
                'total' => $ad->total(),
            ],
        ];
    }




    public function store(AdRequest $request)
    {

        Log::info($request->all());
        $validatedData = $request->validated();

        $ad = Ad::create($validatedData);

        if ($request->hasFile('photo')) {

            $ad->addMediaFromRequest('photo')->toMediaCollection('ads');
        }

        return response()->json($ad);

    }



    public function show($id)
    {
        $ad = Ad::query()->with('photo')->findOrFail($id);

        return new AdResource($ad);
    }



    public function update(AdRequest $request, $id)
    {
        $ad = Ad::findOrFail($id);

        $ad->update($request->validated());

        if ($request->hasFile('photo')) {

            $ad->addMediaFromRequest('photo')->toMediaCollection('ads');
        }

        return response()->json($ad);
    }



    public function destroy($id)
    {
        $ad = Ad::findOrFail($id);

        $ad->delete();
        return response()->json(['Message,Deleted Successfully']);
    }
}
