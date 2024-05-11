<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\InterestsModel;
use Illuminate\Http\Request;

class InterestsController extends Controller
{
    private $model;
    public function __construct(InterestsModel $model)
    {
        $this->model = $model;
    }

    public function index(){
        $vars = [
            'args'=>$this->model->interests(),
        ];
        return view("interests", $vars);
    }
}
