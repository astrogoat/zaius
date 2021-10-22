<?php

namespace Astrogoat\Zaius;

use Helix\Lego\Apps\App;
use Helix\Lego\LegoManager;
use Helix\Zaius\Zaius as HelixZaius;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Astrogoat\Zaius\Settings\ZaiusSettings;

class ZaiusServiceProvider extends PackageServiceProvider
{
    public function registerApp(App $app)
    {
        return $app
            ->name('zaius')
            ->settings(ZaiusSettings::class)
            ->migrations([
                __DIR__ . '/../database/migrations/settings',
            ])
            ->callAfterRegistering(function (App $zaiusApp) {
                app()->bind(HelixZaius::class, function () use ($zaiusApp) {
                    return new HelixZaius($zaiusApp->getSettings()->public_key, $zaiusApp->getSettings()->private_key);
                });
            });
    }

    public function registeringPackage()
    {
        $this->callAfterResolving('lego', function (LegoManager $lego) {
            $lego->registerApp(function (App $app) {
                return $this->registerApp($app);
            });
        });
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('zaius')
            ->hasViews();
    }
}
