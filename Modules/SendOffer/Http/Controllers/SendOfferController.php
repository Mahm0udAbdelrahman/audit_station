<?php

namespace Modules\SendOffer\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\SendOffer\Http\Requests\SendOfferRequest;
use Modules\SendOffer\Models\SendOffer;
use Modules\SendOffer\Transformers\SendOfferResource;

class SendOfferController extends Controller
{

    public function showall(){
        $sendOffer = SendOffer::query()->paginate(5);

        return response()->json($sendOffer);
    }

    public function show($id){
        $sendOffers = SendOffer::with('company')->findOrFail($id);
        return new SendOfferResource($sendOffers);
    }

    public function store(SendOfferRequest $request){

        $validateData = $request->validated();
        $sendOffer = SendOffer::create($validateData);
        return response()->json($sendOffer,201);
    }

    public function update(SendOfferRequest $request,$id){
        $sendOffer = SendOffer::findOrFail($id);
        $validateData = $request->validated();
        $sendOffer->update($validateData);
        return response()->json($sendOffer);
    }

    public function destroy($id){
        $sendOffer = SendOffer::findOrFail($id);
        $sendOffer->delete();
        return response()->json(['Message'=>'Deleted']);
    }
}
