# SahRule

[![Latest Stable Version](https://poser.pugx.org/raditzfarhan/sahrule/v/stable?format=flat-square)](https://packagist.org/packages/raditzfarhan/sahrule)
[![Total Downloads](https://img.shields.io/packagist/dt/raditzfarhan/sahrule?style=flat-square)](https://packagist.org/packages/raditzfarhan/sahrule)
[![License](https://poser.pugx.org/raditzfarhan/sahrule/license?format=flat-square)](https://packagist.org/packages/raditzfarhan/sahrule)
[![StyleCI](https://github.styleci.io/repos/7548986/shield?style=square)](https://github.com/raditzfarhan/sahrule)

This package provides missing Laravel validation rules.

## Installation

Via Composer

``` bash
$ composer require raditzfarhan/sahrule
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
| Base64MaxImageSize | Validate a base64 image size. Default max size is **2 MB**. Pass your own max size in byte (B). | `new Base64MaxImageSize`<br/>`new Base64MaxImageSize(500)`|
| StrongPassword | The password must be at least 8 alphanumeric characters long, include one lowercase, one uppercase letter and one number. | `new StrongPassword`|

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
## Change log

Please see the [changelog](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Raditz Farhan](https://github.com/raditzfarhan)

## License

MIT. Please see the [license file](LICENSE) for more information.
