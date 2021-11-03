<?php

namespace Astrogoat\Zaius\Promobar\Types;

use Astrogoat\Promobar\Types\PromobarType;

class ZaiusType extends PromobarType
{
    public function renderSettings() : string
    {
        return 'zaius::promobar.settings';
    }

    public function renderComponent() : string
    {
        return 'zaius::promobar.component';
    }
}
