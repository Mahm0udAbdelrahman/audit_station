<?php

namespace Modules\Company\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Modules\Company\Http\Requests\CompanyRequest;
use Modules\Company\Models\Company;
use App\Traits\HttpResponse;
use Modules\Company\Transformers\CompanyResource;

class CompanyController extends Controller
{
    use HttpResponse;
    public function showall(Request $request)
    {

        $filter = $request->query('filter');

        $companyQuery = Company::query()
            ->searchable(['name', 'status'])
            ->when($filter, fn($builder) => $builder->where('status', $filter))
            ->with('accountants');
             $company = $companyQuery->paginate(5);

        return $this->paginatedResponse($company, CompanyResource::class);
    }


    public function store(CompanyRequest $request)
    {

        $validatedData = $request->validated();

        if ($request->hasFile('certificate')) {
            $validatedData['certificate'] = $request->file('certificate')->store('certificates', 'public');
        }

        $company = Company::create($validatedData);

        return response()->json($company, 201);
        // return response()->json(['message' => 'Company created successfully'], 201);

    }


    public function show($id)
    {
        $company = Company::with('accountants')->findOrFail($id);

        return new CompanyResource($company);
    }


    public function downloadCertificate($id)
    {
        $company = Company::findOrFail($id);

        if ($company->certificate && Storage::disk('public')->exists($company->certificate)) {
            return response()->download(storage_path('app/public/' . $company->certificate));

        }

        return response()->json(['message' => 'Certificate not found'], 404);
    }


    public function update(CompanyRequest $request, $id)
    {

        $company = Company::findOrFail($id);

        $validatedData = $request->validated();

        if ($request->hasFile('certificate')) {
            $validatedData['certificate'] = $request->file('certificate')->store('certificates', 'public');
        }

        $company->update($validatedData);

        return response()->json($company);
    }


    public function destroy($id){

        $company = Company::findOrFail($id);
        $company->delete();

        return response()->json(['Message'=>'Deleted Successfully']);

    }
}
