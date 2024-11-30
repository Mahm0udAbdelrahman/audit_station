<?php

namespace Modules\StepsToBeUnique\Services;

use Modules\StepsToBeUnique\Models\StepsToBeUnique;



class StepsToBeUniqueService
{
    public $model;

    public function __construct(StepsToBeUnique $model)
    {
        $this->model = $model;
    }


    public function index()
    {
        return $this->model->paginate();
    }

    public function store(array $data)
    {

        $StepsToBeUnique = $this->model->create($data);
        if(isset($data['photo']))
        {
            $StepsToBeUnique->addMediaFromRequest('photo')->toMediaCollection('photos');
        }
        return $StepsToBeUnique;
    }

    public function show($id)
    {
        $StepsToBeUnique = $this->model->findOrFail($id);
        return $StepsToBeUnique;
    }
    public function update($id, $data)
    {

        $StepsToBeUnique = $this->show($id);
        $StepsToBeUnique->update($data);

        if(isset($data['photo']))
        {
            $photo = $StepsToBeUnique->getFirstMedia('photos');
            if($photo)
            {
                $photo->delete();
            }
            $StepsToBeUnique->addMediaFromRequest('photo')->toMediaCollection('photos');

        }


        return $StepsToBeUnique = $this->show($id);
    }

    public function destroy($id)
    {
        $StepsToBeUnique = $this->show($id);

        $StepsToBeUnique->delete();
    }
}
