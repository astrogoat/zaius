<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateZaiusSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('zaius.enabled', false);
        $this->migrator->add('zaius.public_key', '');
        $this->migrator->addEncrypted('zaius.private_key', '');
        $this->migrator->add('zaius.newsletter_list_id', '');
    }

    public function down()
    {
        $this->migrator->delete('zaius.enabled', false);
        $this->migrator->delete('zaius.public_key', '');
        $this->migrator->delete('zaius.private_key', '');
        $this->migrator->delete('zaius.newsletter_list_id', '');
    }
}
