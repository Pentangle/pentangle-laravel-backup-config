# An in house package for configuring backups with s3

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pentangle/pentangle_laravel_backup_config.svg?style=flat-square)](https://packagist.org/packages/pentangle/pentangle_laravel_backup_config)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/pentangle/pentangle_laravel_backup_config/run-tests?label=tests)](https://github.com/pentangle/pentangle_laravel_backup_config/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/pentangle/pentangle_laravel_backup_config/Check%20&%20fix%20styling?label=code%20style)](https://github.com/pentangle/pentangle_laravel_backup_config/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/pentangle/pentangle_laravel_backup_config.svg?style=flat-square)](https://packagist.org/packages/pentangle/pentangle_laravel_backup_config)

## Installation

You can install the package via composer:

```bash
composer require pentangle/pentangle-laravel-backup-config
```

## Usage

Add the following disk configuration to filesystems.php

```php
    'pentangle-s3' => [
        'driver'   => 's3',
        'key'      => env('PENTANGLE_AWS_ACCESS_KEY_ID'),
        'secret'   => env('PENTANGLE_AWS_SECRET_ACCESS_KEY'),
        'region'   => env('PENTANGLE_AWS_DEFAULT_REGION'),
        'bucket'   => env('PENTANGLE_AWS_BUCKET'),
        'url'      => env('PENTANGLE_AWS_URL'),
        'endpoint' => env('PENTANGLE_AWS_ENDPOINT'),
        'root'     => str_replace(['http://', 'https://'], '', env('APP_URL')),
    ],
```

Add the following service provider to config/app.php (optional)

```php
    \Pentangle\PentangleLaravelBackupConfig\PentangleLaravelBackupServiceProvider::class,
```

Publish the config file (optional)

```php
    php artisan vendor:publish --provider="Pentangle\PentangleLaravelBackupConfig\PentangleLaravelBackupServiceProvider"
```

For testing locally with s3 ensure the correct path to mysqldump is set in config/databases.php

```php
    'dump'           => [
        'dump_binary_path' => env('APP_ENV') === 'local' ? '/usr/local/opt/mysql-client/bin' : '/usr/bin',
    ],
```

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

- [Séan Poynter-Smith](https://github.com/spoyntersmith)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
