<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CIFValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        if(!preg_match('/^[A-HJNPQRSUVW]{1}\d{7}[0-9A-J]$/', $value)){
            $fail('El formato del :attribute no es válido');
        }
    }
}
