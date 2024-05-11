<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ContactModel;
use App\Models\TestModel;
use Illuminate\Http\Request;

class TestController extends Controller
{
    private $model;
    public function __construct(TestModel $model)
    {
        $this->model = $model;
    }

    public function index(String $result = ""){
        $vars = [
            'errors'=>$this->model->validator->ShowErrors(),
            'result'=>$result,
        ];
        return view("test", $vars);
    }

    public function validate(Request $form){
//        dd($form);
        $this->model->validate($form->post());
        if($this->model->validator->ShowErrors() != ""){
            return $this->index();
        }

        return $this->index($this->model->checkAnswers($form->post()));
    }
}
