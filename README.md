# response-time
[![Packagist version][packagist-image]][packagist-url]
[![Build Status][travis-image]][travis-url]

> Set `X-Response-Time` to response header

## Install

```sh
$ composer require lara-middleware/response-time
```

or add

`"lara-middleware/response-time": "dev-master"`

to `package.json` > `"require"`

## Usage

#### For all routes

add `'LaraMiddleware\ResponseTime\ResponseTime'` to

`app/Http/Kernel.php`'s `$middleware`

#### For specific routes

add `'response-time' => 'LaraMiddleware\ResponseTime\ResponseTime',` to

`app/Http/Kernel.php`'s `$routeMiddleware`

Then,

```php
Route::get('some-specific', ['middleware' => 'response-time', function()
{
    //
}]);
```

## License
MIT © [C. T. Lin](https://github.com/chentsulin)

[packagist-image]: https://img.shields.io/packagist/v/lara-middleware/response-time.svg?style=flat-square
[packagist-url]: https://packagist.org/packages/lara-middleware/response-time
[travis-image]: https://travis-ci.org/lara-middleware/response-time.svg
[travis-url]: https://travis-ci.org/lara-middleware/response-time
