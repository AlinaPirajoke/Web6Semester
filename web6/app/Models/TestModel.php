<?php

namespace App\Models;

use App\Models\Validators\ResultsVerification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    use HasFactory;

    public $validator;

    public function __construct(ResultsVerification $validator)
    {
        $this->validator = $validator;
    }

    public function validate($post)
    {
        $this->validator->validate($post);
    }

    public function checkAnswers($post): string
    {
        return $this->validator->checkAnswers($post);
    }
}
