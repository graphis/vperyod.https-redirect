#vperyod.https-redirect
Simple middleware to force https

[![Latest version][ico-version]][link-packagist]
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]

## Installation
```bash
composer require vperyod/https-redirect
```

## Usage

```php
use Vperyod\HttpsRedirect\ForceHttps;

// Add to your middleware stack, radar, relay, etc.
$stack->middleware(new ForceHttps);
```


[ico-version]: https://img.shields.io/packagist/v/vperyod/https-redirect.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/vperyod/vperyod.https-redirect/develop.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/vperyod/vperyod.https-redirect.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/vperyod/vperyod.https-redirect.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/vperyod/https-redirect
[link-travis]: https://travis-ci.org/vperyod/vperyod.https-redirect
[link-scrutinizer]: https://scrutinizer-ci.com/g/vperyod/vperyod.https-redirect
[link-code-quality]: https://scrutinizer-ci.com/g/vperyod/vperyod.https-redirect
