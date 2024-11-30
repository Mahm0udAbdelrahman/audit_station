<?php


namespace Modules\Exam\Services;

use Modules\Exam\Models\Exam;

class ExamService
{
    public $model;
    public function __construct(Exam $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->paginate();
    }

    public function store(array $data)
    {

        $exam = $this->model->create($data);

        if (isset($data['question_id']) || isset($data['specialization_question_id'])) {
            if (isset($data['question_id'])) {
                foreach ($data['question_id'] as $question) {
                    $exam->questions()->syncWithoutDetaching($question);
                }
            }else{
                if($data['question_id'] != $data['question_id']){
                    return false;
                }
            }

            if (isset($data['specialization_question_id'])) {
                foreach ($data['specialization_question_id'] as $specializationQuestion) {
                    $exam->specializationQuestions()->syncWithoutDetaching($specializationQuestion);
                }

            }else{
                if ($data['specialization_question_id'] != $data['specialization_question_id']) {
                    return false;
                }
            }
        }

        return $exam;
    }


    public function show($id)
    {
        $exam = $this->model->findOrFail($id);
        return $exam;
    }

    public function update($id, $data)
    {
        $exam = $this->show($id);
        $exam->update($data);
        if(isset($data['question_id']) || isset($data['specialization_question_id'])) {
            if (isset($data['question_id'])) {
                $exam->answers()->sync($data['question_id']);
            }

            if (isset($data['specialization_question_id'])) {
                $exam->specializationAnswers()->sync($data['specialization_question_id']);
            }
        }



        return $exam;
    }


    public function destroy($id)
    {
        $exam = $this->show($id);
        if($exam)
        {
            $exam->answers()->detach();
            $exam->specializationAnswers()->detach();
        }
        $exam->delete();
    }
}
