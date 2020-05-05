<?php
namespace RaditzFarhan\SahRule;

use Illuminate\Contracts\Validation\Rule as BaseRule;

abstract  class Rule implements BaseRule
{
    /**
     * Get local validation message, otherwise return default message
     *
     * @param  string  $attr
     * @param  mixed  $message
     * @return string
     */
    public function getValidationMessage(string $attr, string $message)
    {
        return __("validation.$attr") === "validation.$attr" ? $message : __("validation.$attr");
    }
}