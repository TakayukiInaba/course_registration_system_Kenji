<?php

namespace App\Support;

use Illuminate\Validation\Validator;

class CustomValidator extends Validator
{
    public function validatePasswordBetween($attribute,$value,$parameters)
    {
        $min = $parameters[0];
        $max = $parameters[1];

        $len = strlen($value);

        if ($len < $min || $len > $max)
        {
            return false;
        }
        return true;
    }

    protected function replacePasswordBetween($message,$attribute,$rule,$parameters)
    {
        $message = str_replace(':min',$parameters[0],$message); //:min -> 4に置換
        $message = str_replace(':max',$parameters[1],$message); //:max -> 30に置換
        
        return $message;
    }

}