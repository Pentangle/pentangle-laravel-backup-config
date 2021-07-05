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
    }
}
