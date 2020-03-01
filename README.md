Worldlink API Laravel Package
=============================

[![Latest Version](https://img.shields.io/github/v/release/TheBikramLama/worldlink-package.svg?style=flat-square)](https://github.com/TheBikramLama/worldlink-package/releases)
![Issues](https://img.shields.io/github/issues/TheBikramLama/worldlink-package)
[![Downloads](https://img.shields.io/packagist/dt/TheBikramLama/worldlink.svg?style=flat-square)](https://packagist.org/packages/thebikramlama/worldlink)

Worldlink API is a Laravel Package used to query user details from worldlink.

Demo: [Worldlink API Implementation](https://worldlink.bikramlama.com.np)
Implementation Source: [https://github.com/TheBikramLama/worldlink-implementation](https://github.com/TheBikramLama/worldlink-implementation)

## Getting Started

This package can be installed through Composer.

```bash
composer require thebikramlama/worldlink
```

## How to obtain User details from worldlink

After the installation is complete, `Worldlink` alias is generated by default.

### Using the default Alias
```php
// Using Default 
use Worldlink;
```

### Getting the user details
```php
// Intialize a new instance
$worldlink = new Worldlink;
// Call the method named query passing worldlink's username as the argument
$response = $worldlink->query('username'); // This will return a pseudo JSON data.

// Getting a specific field from the response
json_decode($response)->data->full_name; // This will return the full name from the retrieved data
```

### Getting specific user field
```php
// Intialize a new instance
$worldlink = new Worldlink;
// Call the method named query passing worldlink's username as the argument
$worldlink->query('username'); // This will return a pseudo JSON data.

// Getting a specific field from the response
$worldlink->getField('full_name'); // This will return the full name from the retrieved data
$worldlink->getField('days_left'); // This will return the days left from the retrieved data
```

### Available Fields
```php
$worldlink->getField('user');  // Username
$worldlink->getField('full_name'); // Full Name
$worldlink->getField('current_plan'); // Current Internet Plan
$worldlink->getField('message'); // Generic Message from the provider
$worldlink->getField('days_left'); // Days left for subscription expiry
$worldlink->getField('amount'); // Amount to pay on renewal
$worldlink->getField('advance_payment'); // Flag for advance payment availability (true, false, paid)
$worldlink->getField('expires_at'); // Full Formatted Date for exipry
$worldlink->getField('expires_at_unix'); // Unix timestamp for exipry
$worldlink->getField('payment_options'); // Other Payment options (in array)
```

## Caching

The package caches the responses for 60 minutes in default.

If you would like to change the caching time, make sure you have published `worldlink.php` config file

```bash
php artisan vendor:publish --provider="Thebikramlama\Worldlink\WorldlinkServiceProvider"
```
You can find the `worldlink.php` config file under `config/worldlink.php` inside your laravel project.

You can edit the file as per your need.
```php
/*
  Set cache expiration here
  Set the cache period in minutes
  Set 0 for no cache
*/
'cache_expiration' => 60,
```

## Credits
- [Bikram Lama](https://github.com/TheBikramLama)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
