# php-peek-lock

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A PHP library which acts as a wrapper around flock()

You can use this to run jobs in the background and peek from the webserver if they are still running.

## Install

Via Composer

``` bash
$ composer require polderknowledge/php-peek-lock
```

## Usage

Please read the documentation for this package for a quick setup.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please report them via [HackerOne](https://hackerone.com/polderknowledge) 
instead of using the issue tracker or e-mail.

## Community

We have an IRC channel where you can find us every now and then. We're on the Freenode network in the
channel #polderknowledge.

## Credits

- [Polder Knowledge][link-author]
- [All Contributors][link-contributors]

## License

Please see [LICENSE.md][link-license] for the license of this application.

[ico-version]: https://img.shields.io/packagist/v/polderknowledge/php-peek-lock.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/polderknowledge/php-peek-lock/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/polderknowledge/php-peek-lock.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/polderknowledge/php-peek-lock.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/polderknowledge/php-peek-lock.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/polderknowledge/php-peek-lock
[link-travis]: https://travis-ci.org/polderknowledge/php-peek-lock
[link-scrutinizer]: https://scrutinizer-ci.com/g/polderknowledge/php-peek-lock/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/polderknowledge/php-peek-lock
[link-downloads]: https://packagist.org/packages/polderknowledge/php-peek-lock
[link-author]: https://polderknowledge.com
[link-contributors]: ../../contributors
[link-license]: LICENSE.md
