<p align="center">
    <a href="https://github.com/raditzfarhan/sahrule"><img src="https://img.shields.io/badge/License-MIT-yellow.svg?style=flat-square" alt="License"></a>    
    <a href="https://github.com/raditzfarhan/sahrule"><img src="https://github.styleci.io/repos/7548986/shield?style=square" alt="styleci"></img></a>
</p>

# SahRule
This package provides missing Laravel validation rules.

## Installation

Via Composer

``` bash
$ composer require raditzfarhan/sahrule:^1.0
```

## Usage
Import validation classes that you need and use it in Laravel validate function as you normally would. Example usage as below snippet:

```php
use RaditzFarhan\SahRule\Rules\Base64Image;

...

// will accept pre-defined allowed image types
$validatedData = $request->validate([
    'image' => ['required', new Base64Image]
]);

// specify allowed image types
$validatedData = $request->validate([
    'image' => ['required', new Base64Image('png', 'gif')]
]);

```
>  Use array instead of pipe-delimited string.

## Available Rules

All rules are under `RaditzFarhan\SahRule\Rules` namespace.

| Rule          | Description  | Example |  
|---------------|--------------|--------------------------------------|
| Base64Image   | Validate a base64 image string. Pre-defined allowed image types are **jpg**, **jpeg**, **png**, **gif**, **bmp** and **tiff**. | `new Base64Image`<br/>`new Base64Image('jpg', 'png')` |

## Validation Message

All rules come with a default validation message that was pre-defined by the package. If you need to write your own custom message, you can overwrite in in `validation.php` file that typically can be found at `resources/lang/en` folder. 

The validation key is the rule class name in snake case format. For example for `Base64Image` rule, the key is `base64_image`. Snippet as below:

```php
return [
    ...
    'base64_image' => 'Your custom validation message here.',
    ...
];
```

## Credits

- [Raditz Farhan](https://github.com/raditzfarhan)

## License

MIT. Please see the [license file](LICENSE) for more information.
