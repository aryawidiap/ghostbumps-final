<?php

namespace App\Rules;

use App\Models\Location;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidLocation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!Location::all()->keys()->contains($value)){
            $fail('The :attribute is not a valid location id.');
        }
    }
}
