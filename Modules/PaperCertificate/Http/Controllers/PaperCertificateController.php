<?php

namespace Modules\PaperCertificate\Http\Controllers;

use App\Helpers\ApiResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\PaperCertificate\Http\Requests\StoreRequest;
use Modules\PaperCertificate\Http\Requests\UpdateRequest;
use Modules\PaperCertificate\Services\PaperCertificateService;
use Modules\PaperCertificate\Transformers\PaperCertificateResource;

class PaperCertificateController extends Controller
{
    use HttpResponse;
    public $PaperCertificate;
    public function __construct(PaperCertificateService $PaperCertificate)
    {
        $this->PaperCertificate = $PaperCertificate;
    }

    public function index()
    {

        $data = $this->PaperCertificate->index();
        return $this->paginatedResponse($data, PaperCertificateResource::class);
    }

    public function store(StoreRequest $request)
    {
        $validation = $request->validated();
        $data = $this->PaperCertificate->store($validation);
        return $this->okResponse(new PaperCertificateResource($data));
     }

    public function show($id)
    {
        $data = $this->PaperCertificate->show($id);
        return $this->okResponse(new PaperCertificateResource($data));
    }

    public function update($id, StoreRequest $request)
    {


        $validation = $request->validated();

        $data =  $this->PaperCertificate->update($id, $validation);




        return $this->okResponse(new PaperCertificateResource($data));
    }

    public function destroy($id)
    {
        $this->PaperCertificate->destroy($id);

        return response()->json(['message' => 'PaperCertificate deleted successfully']);
    }
}
