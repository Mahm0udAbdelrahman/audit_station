<?php

namespace Modules\ContactUs\Http\Controllers;

use App\Helpers\ApiResource;
use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\ContactUs\Http\Requests\StoreRequest;
use Modules\ContactUs\Services\ContactUsService;
use Modules\ContactUs\Transformers\ContactusResource;

class ContactUsController extends Controller
{
    use HttpResponse;

    public  $contactUsServices;

    public function __construct(ContactUsService $contactUsServices)
    {
        $this->contactUsServices = $contactUsServices;
    }

    public function index()
    {

        $data = $this->contactUsServices->index();

        return $this->paginatedResponse($data, ContactusResource::class);

     }

    public function store(StoreRequest $request)
    {

        $ContactUs  = $request->validated();
        $data = $this->contactUsServices->store($ContactUs);
        return $this->okResponse(new ContactusResource($data));



     }

    public function show($id)
    {
        $data = $this->contactUsServices->show($id);
        return $this->okResponse(new ContactusResource($data));
    }
    public function destroy($id)
    {
        $this->contactUsServices->destroy($id);

        return $this->okResponse(message: translate_success_message('expense', 'deleted'));
    }
}
