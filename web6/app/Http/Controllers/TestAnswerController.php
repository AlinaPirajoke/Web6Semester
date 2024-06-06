<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestAnswer;

class TestAnswerController extends Controller
{
    public function index()
    {
        $testAnswers = TestAnswer::all(); // Получаем все записи из таблицы "test_answer"
        return view('answerTest', ['testAnswers' => $testAnswers])->with('title', 'Test');
    }
}
