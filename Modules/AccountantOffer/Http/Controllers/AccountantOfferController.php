<?php

namespace Modules\AccountantOffer\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Modules\Accountant\Models\Accountant;
use Modules\AccountantOffer\Http\Requests\AccountantOfferRequest;
use Modules\AccountantOffer\Models\AccountantOffer;
use Modules\AccountantOffer\Transformers\AccountantOfferResource;

class AccountantOfferController extends Controller
{
    use HttpResponse;

    public function showall(Request $request){
        $filter = $request->query('filter');

        $offersQuery = AccountantOffer::query()
            ->searchable(['position', 'type','status'])
            ->when($filter, fn($builder) => $builder->where('status', $filter));

        $offers = $offersQuery->paginate(5);

        return $this->paginatedResponse($offers, AccountantOfferResource::class);
    }


    public function store(AccountantOfferRequest $request){

        $validatedData = $request->validated();

        $offer = AccountantOffer::create($validatedData);

        return response()->json($offer, 201);
    }


    public function show($id){
        $offer = AccountantOffer::findOrFail($id);
        return new AccountantOfferResource($offer);
    }


    public function update(AccountantOfferRequest $request,$id){

        $offer = AccountantOffer::findOrFail($id);
        $validatedData = $request->validated();
        $offer->update($validatedData);
        return response()->json($offer);
    }


    public function destroy($id){
        $offer = AccountantOffer::findOrFail($id);
        $offer->delete();
        return response()->json(['Message'=>'Deleted']);
    }

      public function getAccountantWithOffers($accountantId)
      {
          $accountant = Accountant::findOrFail($accountantId);

          $offers = $accountant->accountantOffers;

          return response()->json([
              'accountant' => $accountant,
              'offers' => $offers
          ]);
      }

      public function getOfferAccountant($offerId)
      {
          $offer = AccountantOffer::findOrFail($offerId);

          $accountant = $offer->accountant;

          return response()->json([
              'offer' => $offer,
              'accountant' => $accountant
          ]);
      }
}
