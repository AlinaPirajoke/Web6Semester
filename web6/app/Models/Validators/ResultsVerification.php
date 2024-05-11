<?php

namespace App\Models\Validators;

class ResultsVerification extends CustomFormValidator
{
    public function checkAnswers(array $answers): string
    {
        $grade = 0;

        if($answers["math"] == "24"){
            $grade += 1;
        }
        if($answers["graph_option"] == "2"){
            $grade += 1;
        }
        if($answers["graph_text"] == "3"){
            $grade += 1;
        }

        return "Результат: $grade из 3";
    }
}
