<?php

namespace App\Rules;

use App\Models\Clientes;
use App\Models\Empleados;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EmailValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        $clientes = new Clientes();
        $clientes = $clientes::where('correo', $value)->first();
        $empleados = new Empleados();
        $empleados = $empleados::where('correo', $value)->first();

        if ($clientes || $empleados) {
            $fail('El :attribute ya está en uso');
        }
    }
}
