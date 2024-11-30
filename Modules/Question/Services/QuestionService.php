<?php

namespace Modules\Question\Services;

use Modules\Question\Models\Question;
use Modules\Service\Models\Service;


class QuestionService
{
    public $model;

    public function __construct(Question $model)
    {
        $this->model = $model;
    }


    public function index()
    {
        return $this->model->paginate();
    }

    public function store(array $data)
    {
         $question = $this->model->create($data);

             $answers = $data['answer'];
            foreach ($answers as $answer) {
                 $question->answers()->create([
                    'answer' => $answer,
                  ]);
            }
        return $question->load('answers');
    }


    public function show($id)
    {
        $question = $this->model->findOrFail($id);
        return $question;
    }


    public function update($id, $data)
    {
        $specializationQuestion = $this->show($id);

        $specializationQuestion->update($data);

        if (isset($data['answer']) && !empty($data['answer'])) {
            $specializationQuestion->answers()->delete();

            $answers = $data['answer'];
            foreach ($answers as $answer) {
                $specializationQuestion->answers()->create([
                    'answer' => $answer,
                ]);
            }
        }


        return $specializationQuestion->load('answers');
    }

    public function destroy($id)
    {
        $question = $this->show($id);
        $question->delete();
    }
}
