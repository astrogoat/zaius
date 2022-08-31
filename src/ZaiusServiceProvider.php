<?php

namespace Astrogoat\Zaius;

use Astrogoat\Zaius\Promobar\Types\ZaiusType;
use Astrogoat\Zaius\Settings\ZaiusSettings;
use Helix\Lego\Apps\App;
use Helix\Lego\LegoManager;
use Helix\Lego\Services\FrontendViews;
use Helix\Zaius\Zaius as HelixZaius;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ZaiusServiceProvider extends PackageServiceProvider
{
    public function registerApp(App $app)
    {
        return $app
            ->name('zaius')
            ->settings(ZaiusSettings::class)
            ->includeFrontendViews(function (FrontendViews $views) {
                $views->addToHead('zaius::script');
            })
            ->migrations([
                __DIR__ . '/../database/migrations/settings',
            ])
            ->callAfterRegistering(function (App $zaiusApp) {
                app()->bind(HelixZaius::class, function () use ($zaiusApp) {
                    return new HelixZaius($zaiusApp->getSettings()->public_key, $zaiusApp->getSettings()->private_key);
                });

                $this->callAfterResolving('Astrogoat\\Promobar\\Promobar', function ($promobar) use ($zaiusApp) {
                    if ($zaiusApp->isEnabled()) {
                        $promobar->addType('zaius', ZaiusType::class);
                    }
                });
            });
    }

    public function registeringPackage()
    {
        $this->callAfterResolving('lego', function (LegoManager $lego) {
            $lego->registerApp(fn (App $app) => $this->registerApp($app));
        });
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('zaius')
            ->hasViews();
    }
}
