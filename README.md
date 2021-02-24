# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Instructions

I used [Laravel Homestead](https://laravel.com/docs/8.x/homestead) as a local development environment

Please run following commands:

`composer install`

`php artisan migrate`

Available Endpoints:

- Return a list of all entries

```angular2html
GET /api/links
```

- Create a new entry

```angular2html
POST /api/links
Param: 
array(
    'url' =>  "Required, must be a valid URL.",
    'type' => "Required, must be one of the types: product, category, static-page, checkout, homepage",
    'customer_id' => 'Required, a random string'
);
```

- Return a list of entries for a specified URL in an interval

```angular2html
GET /api/links/by-url-in-interval
Param: JSON with structure 
{
    'url': "Required, must be a valid URL.",
    'start_date': "Required, must be a valid, non-relative date according to the strtotime PHP function",
    'end_date': "Not required, must be a valid, non-relative date according to the strtotime PHP function. 
                If is let empty it will be considered as the current moment"
}
```

- Return a list of entries for a specified type in an interval

```angular2html
GET /api/links/by-type-in-interval
Param: JSON with structure 
{
    'type': "Required, must be one of the types: product, category, static-page, checkout, homepage",
    'start_date': "Required, must be a valid, non-relative date according to the strtotime PHP function",
    'end_date': "Not required, must be a valid, non-relative date according to the strtotime PHP function. 
                If is let empty it will be considered as the current moment"
}
```

Database
```angular2html
DB_CONNECTION=mysql
DB_DATABASE=heatmap
DB_USERNAME=homestead
DB_PASSWORD=secret
```
## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Contributing

Thank you for considering contributing to Lumen! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
