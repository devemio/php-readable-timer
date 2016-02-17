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

```php
$timer = new Timer(); // default H:i:s with ms

// Some code...

var_dump($timer->end()); // 00:00:07.270
```
