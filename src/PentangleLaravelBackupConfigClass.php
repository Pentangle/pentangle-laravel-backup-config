<?php

namespace Pentangle\PentangleLaravelBackupConfig;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PentangleLaravelBackupConfigClass extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('pentangle-laravel-backup-config')
            ->hasConfigFile(['backup']);

        app()->config["filesystems.disks.pentangle-s3"] = [
            'driver' => 's3',
            'key' => config('backup.pentangle-s3.key'),
            'secret' => config('backup.pentangle-s3.secret'),
            'region' => config('backup.pentangle-s3.region'),
            'bucket' => config('backup.pentangle-s3.bucket'),
            'url' => config('backup.pentangle-s3.url'),
            'endpoint' => config('backup.pentangle-s3.endpoint'),
            'root' => str_replace(['http://', 'https://'], '', config('app.url')),
        ];
    }
}
