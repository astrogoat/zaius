<?php

namespace Astrogoat\Zaius\Settings;

use Helix\Lego\Settings\AppSettings;

class ZaiusSettings extends AppSettings
{
    public string $public_key;
    public string $private_key;
    public string $newsletter_list_id;

    protected array $rules = [
        'public_key' => ['required_unless:enabled,false'],
        'private_key' => ['required_unless:enabled,false'],
        'newsletter_list_id' => ['required_unless:enabled,false'],
    ];

    public static function encrypted(): array
    {
        return ['private_key'];
    }

    public function description() : string
    {
        return 'With flexible integrations, predictive insights, and personalized marketing campaigns, Zaius is a CDP built to activate your data.';
    }

    public function sections() : array
    {
        return [
            [
                'title' => 'Keys',
                'properties' => ['public_key', 'private_key'],
            ],
            [
                'title' => 'Newsletter',
                'properties' => ['newsletter_list_id'],
            ]
        ];
    }
}
