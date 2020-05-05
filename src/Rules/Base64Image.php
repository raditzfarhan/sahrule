<?php declare(strict_types = 1);

namespace RaditzFarhan\SahRule\Rules;

use RaditzFarhan\SahRule\Rule;
use Illuminate\Support\Str;

class Base64Image extends Rule
{
    private $allow_types = ['bmp', 'jpg', 'jpeg', 'png', 'gif', 'tiff'];

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(...$allow_types)
    {
        if (count($allow_types) > 0) {
            $this->allow_types = $allow_types;
        }        
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
        
        $base64_image = Str::after($value, ';base64,');        

        try {
            $raw_data = base64_decode($base64_image);       
            $mime_type = finfo_buffer(finfo_open(), $raw_data, FILEINFO_MIME_TYPE);
            $ext = substr(strstr($mime_type, '/'), strlen('/'));
           
            if (count($this->allow_types) > 0 && !in_array($ext, $this->allow_types) ) {
                return false;
            }
        } catch (Exception $e){
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
        return $this->getValidationMessage(Str::snake(class_basename($this)), __("The :attribute must be a valid base64 image string and image type."));
    }
}
