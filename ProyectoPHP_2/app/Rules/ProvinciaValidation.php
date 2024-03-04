<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ProvinciaValidation implements ValidationRule
{
    protected $provinceCode;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($provinceCode)
    {
        $this->provinceCode = $provinceCode;
    }

    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure  $fail
     * @return void
     */
    public function validate(string $attribute, $value, Closure $fail): void
    {

        $providedPostalCode = substr($value, 0, 2); // Extraer los dos primeros dígitos del código postal proporcionado

        if ($this->provinceCode != $providedPostalCode) {
            $fail('El código postal no coincide con el código de provincia.');
        }
    }
}
