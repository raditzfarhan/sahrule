<?php

declare(strict_types=1);

namespace RaditzFarhan\SahRule\Rules;

use Illuminate\Support\Str;
use RaditzFarhan\SahRule\Rule;

class Base64MaxImageSize extends Rule
{
    private $max_size; // default to 2MB

    /**
     * Create a new rule instance.
     *
     * @param  int  $max_size
     * @return void
     */
    public function __construct($max_size = 2000000)
    {
            $this->max_size = $max_size;        
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
        if (!Str::containsAll($value, ['data:image/', 'base64,'])) {
            return false;
        }

        // get the image size
        $size = (int) (strlen(rtrim($value, '=')) * 3 / 4);

        if ($size > $this->max_size) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return $this->getValidationMessage(Str::snake(class_basename($this)), __('The :attribute size cannot exceed :max_size.', ['max_size' => $this->bytesToHuman($this->max_size)]));
    }
}
