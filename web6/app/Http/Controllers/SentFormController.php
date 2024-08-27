<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SentFormController extends Controller
{
    public  function index() {
        return view('sent');
    }
}
