<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NotToLoggedUserRule implements Rule
{
    public function __construct()
    {
    }

    public function passes($attribute, $value): bool
    {
        if ($input->email
    }

    public function message(): string
    {
        return 'The validation error message.';
    }
}
