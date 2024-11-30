<?php

namespace Modules\Service\Services;

use Modules\Service\Models\Service;


class ServiceService
{
    public $ServiceModel;

    public function __construct(Service $ServiceModel)
    {
        $this->ServiceModel = $ServiceModel;
    }


    public function index()
    {
        $title = request()->input('title');
        if (isset($title)) {
            return $this->ServiceModel->where('title', 'like', "%$title%")->get();
        }
        return $this->ServiceModel->paginate();
    }

    public function store(array $data)
    {

        $service = $this->ServiceModel->create($data);

        if ($data['image']) {
            $uploadedimage = $service->addMediaFromRequest('image')->toMediaCollection('services');
        }

        return $service;
    }

    public function show($id)
    {
        $service = $this->ServiceModel->findOrFail($id);
        return $service;
    }
    public function update($id, $data)
    {
        $service = $this->show($id);

        $service->update($data);


        if (isset($data['image'])) {
            $oldimage = $service->getFirstMedia('services');
            if ($oldimage) {
                $oldimage->delete();
            }
        $uploadedimage = $service->addMediaFromRequest('image')->toMediaCollection('services');


        }


        return $service->load('media');
    }

    public function destroy($id)
    {
        $service = $this->show($id);
        $service->delete();

     }
}
