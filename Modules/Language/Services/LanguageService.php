<?php

namespace Modules\Language\Services;

use Modules\Language\Models\Language;



class LanguageService
{
    public $model;

    public function __construct(Language $model)
    {
        $this->model = $model;
    }


    public function index()
    {
        return $this->model->paginate();
    }

    public function store(array $data)
    {

        $language = $this->model->create($data);
        return $language;
    }

    public function show($id)
    {
        $language = $this->model->findOrFail($id);
        return $language;
    }
    public function update($id, $data)
    {

        $language = $this->show($id);
        $language->update($data);
        return $language;
    }

    public function destroy($id)
    {
        $language = $this->show($id);

        $language->delete();
    }
}
