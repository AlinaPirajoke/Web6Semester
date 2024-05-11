<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ContactModel;
use App\Models\InterestsModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $model;
    public function __construct(ContactModel $model)
    {
        $this->model = $model;
    }

    public function index(){
        $vars = [
            'errors'=>$this->model->validator->ShowErrors(),
        ];
        return view("contact", $vars);
    }

    public function validate(Request $form){
//        dd($form);
        $this->model->validate($form->post());
        return $this->index();
    }
}
