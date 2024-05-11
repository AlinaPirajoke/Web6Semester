<?php

namespace App\Models\Validators;

class CustomFormValidator extends FormValidator
{
    public function __construct()
    {
        parent::__construct();
        $this->SetRule("math", "IsNotEmpty");
        $this->SetRule("graph_option", "IsNotEmpty");
        $this->SetRule("graph_text", "IsInteger");
        $this->SetRule("group", "IsNotEmpty");
        $this->SetRule("fio", "IsNotEmpty");
    }
}
