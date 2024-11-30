<?php

namespace Modules\ContactUs\Services;

use App\Helpers\MediaHelper;
use Illuminate\Support\Facades\Mail;
use Modules\ContactUs\Models\ContactUs;
use App\Mail\ContactUsMail;

class ContactUsService
{
    public  $contactUsModel;

    public function __construct(ContactUs $contactUsModel)
    {
        $this->contactUsModel = $contactUsModel;
    }


    public function index()
    {
        return $this->contactUsModel->paginate();
    }

    public function store(array $data)
    {
        $contact = $this->contactUsModel->create($data);
        Mail::to('mahmudabdelrahman0@gmail.com')->send(new ContactUsMail($contact));
        return $contact;
    }

    public function show($id)
    {
        $contact = $this->contactUsModel->findOrFail($id);
        return $contact;
    }
    public function destroy($id)
    {
        $Padge = $this->show($id);
        $Padge->delete();
    }

}
