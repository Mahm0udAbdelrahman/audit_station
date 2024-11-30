<?php

namespace Modules\Accountant\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\HttpResponse;
use Modules\Accountant\Http\Requests\AccountantRequest;
use Modules\Accountant\Models\Accountant;
use Modules\Accountant\Transformers\AccountantResource;
use Modules\Auth\Enums\UserTypeEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;


class AccountantController extends Controller
{

    use HttpResponse;

    public function showall(Request $request)
    {
        $filter = $request->query('filter');

        $accountantQuery = Accountant::query()
            ->searchable(['name', 'status'])
            ->when($filter, fn($builder) => $builder->where('status', $filter));

        $accountant = $accountantQuery->paginate(5);

        return $this->paginatedResponse($accountant, AccountantResource::class);
    }





    public function store(AccountantRequest $request)
    {

        $validatedData = $request->validated();

        if ($request->hasFile('certificate')) {
            $validatedData['certificate'] = $request->file('certificate')->store('certificates', 'public');
        }

        $accountant = Accountant::create($validatedData);

        return response()->json($accountant, 201);
    }


    public function show($id)
    {
        $accountant = Accountant::findOrFail($id);
        return new AccountantResource($accountant);
    }


    public function downloadCertificate($id)
    {
        $accountant = Accountant::findOrFail($id);

        if ($accountant->certificate && Storage::disk('public')->exists($accountant->certificate)) {
            return response()->download(storage_path('app/public/' . $accountant->certificate));
        }

        return response()->json(['message' => 'Certificate not found'], 404);
    }


    public function update(AccountantRequest $request, $id)
    {
        $accountant = Accountant::findOrFail($id);
        $validatedData = $request->validated();
        if ($request->hasFile('certificate')) {
            $validatedData['certificate'] = $request->file('certificate')->store('certificates', 'public');
        }
        $accountant->update($validatedData);
        return response()->json($accountant,201);
    }


    public function destroy($id)
    {
        $accountant = Accountant::findOrFail($id);
        $accountant->delete();
        return response()->json(['Message' => 'Deleted Successfully']);
    }


    public function upgrade(AccountantRequest $request): JsonResponse
    {
        if (!auth()->check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        try {
            DB::transaction(function () use ($request) {
                $instructorData = array_merge($request->validated(), ['user_id' => auth()->id()]);
                Accountant::create($instructorData);

                auth()->user()->update(['type' => UserTypeEnum::ACCOUNTANT]);
            });

            return response()->json(['message' => 'User upgraded to Accountant successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Upgrade failed', 'error' => $e->getMessage()], 500);
        }
    }
}
