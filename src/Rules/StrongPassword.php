<?php

declare(strict_types=1);

namespace RaditzFarhan\SahRule\Rules;

use Illuminate\Support\Str;
use RaditzFarhan\SahRule\Rule;

class StrongPassword extends Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*)[A-Za-z\d._~\-!@#\$%\^&\*\(\)\/]{8,}$/';

        return (bool) preg_match($pattern, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return $this->getValidationMessage(Str::snake(class_basename($this)), __('The :attribute must be at least 8 alphanumeric characters long, include one lowercase, one uppercase letter and one number.'));
    }
}
