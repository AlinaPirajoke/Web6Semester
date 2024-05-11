<?php

namespace App\Models;

use App\Models\Validators\FormValidator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    use HasFactory;

    public $validator;

    public function __construct(FormValidator $validator) {
        $this->validator = $validator;
        $this->validator->SetRule("fio", "IsNotEmpty");
        $this->validator->SetRule("radio", "IsNotEmpty");
        $this->validator->SetRule("birthday", "IsNotEmpty");
        $this->validator->SetRule("mail", "IsEmail");
        $this->validator->SetRule("phone", "IsInteger");
    }

    public function validate($post){
        $this->validator->validate($post);
    }
}
