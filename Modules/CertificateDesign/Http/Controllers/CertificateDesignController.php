<?php

namespace Modules\CertificateDesign\Http\Controllers;

use App\Helpers\ApiResource;
use App\Http\Controllers\Controller;
use Modules\CertificateDesign\Http\Requests\StoreRequest;
use Modules\CertificateDesign\Http\Requests\UpdateRequest;
use Modules\CertificateDesign\Models\CertificateDesign;
use Modules\CertificateDesign\Services\CertificateDesignService;
use Modules\CertificateDesign\Transformers\CertificateDesignResource;
use App\Traits\HttpResponse;
use Illuminate\Support\Facades\Storage;


class CertificateDesignController extends Controller
{
    use HttpResponse;
    public $CertificateDesign;
    public function __construct(CertificateDesignService $CertificateDesign)
    {
        $this->CertificateDesign = $CertificateDesign;
    }

    public function index()
    {


        if(request()->has('code'))
        {
            $data = $this->CertificateDesign->index();
            return ApiResource::getResponse(200, 'CertificateDesign Search data', CertificateDesignResource::collection($data));

        }
        $data = $this->CertificateDesign->index();

        return $this->paginatedResponse($data, CertificateDesignResource::class);

    }

    public function store(StoreRequest $request)
    {
        $validation = $request->validated();
        $data = $this->CertificateDesign->store($validation);
        return $this->okResponse(new CertificateDesignResource($data));
     }

    public function show($id)
    {
        $data = $this->CertificateDesign->show($id);
        return $this->okResponse(new CertificateDesignResource($data));
    }

    public function update($id, UpdateRequest $request)
    {


        $validation = $request->validated();

        $data =  $this->CertificateDesign->update($id, $validation);

        return $this->okResponse(new CertificateDesignResource($data));
    }

    public function destroy($id)
    {
        $this->CertificateDesign->destroy($id);

        return $this->okResponse(message: translate_success_message('expense', 'deleted'));
    }

    public function download($id)
    {
        $CertificateDesign = $this->CertificateDesign->show($id);
        $file = $CertificateDesign->getFirstMedia('certificate');

        if (!$file) {
            return back()->withErrors(['message' => 'File not found']);
        }
        return response()->download($file->getPath(), $file->file_name);
    }





}
