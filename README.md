# Timer

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This package allows to measure time and display it to a human readable format `00:00:00.000`.

## Install

Via Composer

``` bash
$ composer require isswp101/timer
```

## Usage

With milliseconds:

```php
$timer = new Timer(); // default H:i:s.ms
// some code...
var_dump($timer->end()); // 00:00:07.270
```

With microseconds:

```php
$timer = new Timer('H:i:s.u');
// some code...
var_dump($timer->end()); // 00:00:07.271315
```

Deferred output:

```php
$timer = new Timer();
// some code...
$timer->stop();
// some other code...
var_dump($timer->time()); // 00:00:07.270
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email isswp101@gmail.com instead of using the issue tracker.

## Credits

- [Sergey Sorokin][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/isswp101/timer.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/isswp101/timer/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/isswp101/timer.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/isswp101/timer.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/isswp101/timer.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/isswp101/timer
[link-travis]: https://travis-ci.org/isswp101/timer
[link-scrutinizer]: https://scrutinizer-ci.com/g/isswp101/timer/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/isswp101/timer
[link-downloads]: https://packagist.org/packages/isswp101/timer
[link-author]: https://github.com/isswp101
[link-contributors]: ../../contributors