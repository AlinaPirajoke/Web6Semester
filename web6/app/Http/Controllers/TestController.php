<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TestModel;
use App\Models\TestAnswer;
use Illuminate\Http\Request;

class TestController extends Controller
{
    private $model;
    protected $testAnswerModel;

    public function __construct(TestModel $model)
    {
        $this->model = $model;
        $this->testAnswerModel = new TestAnswer();
    }

    public function index(String $result = ""){
        $vars = [
            'errors'=>$this->model->validator->ShowErrors(),
            'result'=>$result,
        ];
        return view("test", $vars);
    }

    public function validate(Request $form){
        $this->model->validate($form->post());
        if($this->model->validator->ShowErrors() != ""){
            return $this->index();
        }
        $this->saveAnswer($form, $this->model->checkAnswers($form->post()));

        return $this->index($this->model->checkAnswers($form->post()));
    }

    function saveAnswer(Request $request, String $result) {
        if ($request->isMethod('post')) {
            $this->testAnswerModel->FIO = $request->input('fio');
            $this->testAnswerModel->group = $request->input('group');
            $this->testAnswerModel->answer1 = $request->input('math');
            $this->testAnswerModel->answer2 = $request->input('graph_option');
            $this->testAnswerModel->answer3 = $request->input('graph_text');
            $this->testAnswerModel->isCorrect = $result == "Результат: 3 из 3";
            $this->testAnswerModel->save();
        }
    }
}
