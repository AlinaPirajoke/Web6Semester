<?php

namespace App\Models\Validators;

class FormValidator
{
    public $rules;
    public $errors;

    public function __construct()
    {
        $this->errors = array();
        $this->rules = array();
    }

    public function isNotEmpty($data)
    {
        if (empty($data)) {
            return "Поле не должно быть пустым.";
        }
    }

    public function isInteger($data)
    {
        if (!ctype_digit($data)) {
            return "Значение должно быть целым числом.";
        }
    }

    public function isLess($data, $value = 30)
    {
        if (!ctype_digit($data) || $data < $value) {
            return "Значение должно быть целым числом и не меньше $value.";
        }
    }

    public function isGreater($data, $value = 14)
    {
        if (!ctype_digit($data) || $data > $value) {
            return "Значение должно быть целым числом и не больше $value.";
        }
    }

    public function isEmail($data)
    {
        if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
            return "Значение должно быть корректным.";
        }
    }

    public function SetRule($field_name, $validator_name)
    {
        $this->rules[$field_name] = $validator_name;
    }

    public function validate($post_array)
    {
        array_splice($this->errors, 0);
        foreach ($this->rules as $field_name => $validator_name) {
            $error = $this->$validator_name($post_array[$field_name]);
            if ($error) {
                $this->errors[$field_name] = $error;
            }
        }
    }

    public function ShowErrors()
    {
        if (empty($this->errors)) {return "";}
        $html = "<ul>";
        foreach ($this->errors as $field_name => $error) {
            $html .= "<li><strong>$field_name</strong>: $error</li>";
        }
        $html .= "</ul>";
        return $html;
    }
}

