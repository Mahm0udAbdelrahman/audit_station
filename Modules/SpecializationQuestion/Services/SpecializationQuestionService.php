<?php


namespace Modules\SpecializationQuestion\Services;

use Modules\SpecializationQuestion\Models\SpecializationQuestion;

class SpecializationQuestionService
{
    public $model;
    public function __construct(SpecializationQuestion $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->with('answers')->paginate();
    }

    public function store(array $data)
    {

        $specializationQuestion = $this->model->create($data);

        $answers = $data['specialization_answer'];

            foreach ($answers as $answer) {
                $specializationQuestion->answers()->create([
                'specialization_answer' => $answer,
                ]);
            }


        return $specializationQuestion->load('answers');

    }


    public function show($id)
    {
        $specializationQuestion = $this->model->with('answers')->findOrFail($id);
        return $specializationQuestion;
    }

   

    public function update($id, $data)
    {
         $specializationQuestion = $this->show($id);

         $specializationQuestion->update($data);

         if (isset($data['specialization_answer']) && !empty($data['specialization_answer'])) {
             $specializationQuestion->answers()->delete();

             $answers = $data['specialization_answer'];
            foreach ($answers as $answer) {
                $specializationQuestion->answers()->create([
                    'specialization_answer' => $answer,
                ]);
            }
        }


        return $specializationQuestion->load('answers');
    }




    public function destroy($id)
    {
        $specializationQuestion = $this->show($id);
        $specializationQuestion->delete();
    }
}
