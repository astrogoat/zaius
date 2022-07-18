# A Zaius app for Stratum

[![Latest Version on Packagist](https://img.shields.io/packagist/v/astrogoat/zaius.svg?style=flat-square)](https://packagist.org/packages/astrogoat/zaius)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/astrogoat/zaius/run-tests?label=tests)](https://github.com/astrogoat/zaius/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/astrogoat/zaius/Check%20&%20fix%20styling?label=code%20style)](https://github.com/astrogoat/zaius/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/astrogoat/zaius.svg?style=flat-square)](https://packagist.org/packages/astrogoat/zaius)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require astrogoat/zaius
```

## Usage

Add the script include where needed:
```php
@include('zaius::script')
```

### Modals
You can also open a modal by including 
```
@include('zaius::modal')
``` 
and open the modal by calling `openZaiusModal(contentId)`.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Kristoffer Tonning](https://github.com/astrogoat)
- [All Contributors](../../contributors)

This zaius package is forked from the awesome [Spatie zaius package](https://github.com/spatie/package-zaius-laravel#support-us). Please go support them if you can.




## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
