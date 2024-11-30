<?php

namespace Modules\BecomeCompany\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\BecomeCompany\Http\Requests\BecomeCompanyRequest;
use Modules\BecomeCompany\Models\BecomeCompany;
use Modules\BecomeCompany\Transformers\BecomeCompanyResource;

class BecomeCompanyController extends Controller
{


    public function showall()
    {

        $become = BecomeCompany::query()->with(['photo'])->paginate(5);
        return response()->json($become);
    }

    public function show($id){
        $become = BecomeCompany::findOrFail($id);
        return new BecomeCompanyResource($become);
    }

    public function store(BecomeCompanyRequest $request)
    {
        $validateData = $request->validated();

        $become = BecomeCompany::create($validateData);

        if ($request->hasFile('company_logo')) {
            $become->addMediaFromRequest('company_logo')->toMediaCollection('logos');
        }

        if ($request->hasFile('license_and_tex_infomation')) {
            $become->addMediaFromRequest('license_and_tex_infomation')->toMediaCollection('licenses');
        }

        return response()->json($become, 201);
    }



    public function update(BecomeCompanyRequest $request ,$id){

        $validateData = $request->validated();
        $becomeCompany = BecomeCompany::findOrFail($id);
        $becomeCompany->update($validateData);

        if ($request->hasFile('company_logo')) {
            $becomeCompany->addMediaFromRequest('company_logo')->toMediaCollection('logos');
        }

        if ($request->hasFile('license_and_tex_infomation')) {
            $becomeCompany->addMediaFromRequest('license_and_tex_infomation')->toMediaCollection('licenses');
        }

        return response()->json($becomeCompany, 200);
    }

    public function destroy($id){
        $become = BecomeCompany::findOrFail($id);
        $become->delete();
        return response()->json(['Message'=>'Deleted']);
    }
}
