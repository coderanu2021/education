<?php

namespace App\Filament\Resources\Settings\Pages;

use App\Filament\Resources\Settings\SettingResource;
use App\Models\Setting;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class ManageSettings extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    public function mount(int | string $record = null): void
    {
        // Get or create the first settings record
        $setting = Setting::first();
        
        if (!$setting) {
            // Create default settings if none exist
            $setting = Setting::create([
                'site_name' => 'CSA Education',
                'primary_color' => '#1db6c5',
                'secondary_color' => '#001848',
            ]);
        }
        
        // Mount with the settings record
        parent::mount($setting->id);
    }

    protected function getRedirectUrl(): ?string
    {
        return static::getResource()::getUrl('index');
    }
}
