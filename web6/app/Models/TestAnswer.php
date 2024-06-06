<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestAnswer extends Model
{
   protected $table = 'test_answer';
   protected $fillable = ['FIO', 'group', 'answer1', 'answer2', 'answer3', 'isCorrect'];
}
