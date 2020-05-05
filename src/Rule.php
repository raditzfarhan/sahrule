<?php

namespace RaditzFarhan\SahRule;

use Illuminate\Contracts\Validation\Rule as BaseRule;

abstract class Rule implements BaseRule
{
    /**
     * Get local validation message, otherwise return default message.
     *
     * @param  string  $attr
     * @param  mixed  $message
     * @return string
     */
    public function getValidationMessage(string $attr, string $message)
    {
        return __("validation.$attr") === "validation.$attr" ? $message : __("validation.$attr");
    }

    /**
     * Change bytes size to human readable format.
     *
     * @param  string  $bytes
     * @return string
     */
    public static function bytesToHuman($bytes)
    {
        $units = ['B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }
}
