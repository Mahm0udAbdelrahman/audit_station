<?php

namespace Modules\SocialMedia\Services;

use App\Models\SocialMedia;

class SocialMediaService
{
    public $model;

    public function __construct(SocialMedia $model)
    {
        $this->model = $model;
    }



    public function index()
    {
        return $this->model->paginate();
    }

    public function store(array $data)
    {
        $data['user_id'] = auth()->user()->id;
        $SocialMedia = $this->model->create($data);
        return $SocialMedia;
    }

    public function show($id)
    {
        $SocialMedia = $this->model->findOrFail($id);
         return $SocialMedia;
    }
    public function update($id, $data)
    {

        $SocialMedia = $this->show($id);
        $SocialMedia->update($data);
        return $SocialMedia;
    }

    public function destroy($id)
    {
        $SocialMedia = $this->show($id);
        $SocialMedia->delete();
    }
}
