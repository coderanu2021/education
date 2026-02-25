<?php

namespace App\Filament\Resources\Settings\Pages;

use App\Filament\Resources\Settings\SettingResource;
use App\Models\Setting;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSettings extends ManageRecords
{
    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->visible(fn () => Setting::count() === 0),
        ];
    }

    public function mount(): void
    {
        $setting = Setting::first();
        
        if ($setting) {
            $this->record = $setting;
            $this->fillForm();
        } else {
            // Create default settings if none exist
            $setting = Setting::create([
                'site_name' => 'CSA Education',
                'primary_color' => '#1db6c5',
                'secondary_color' => '#001848',
            ]);
            $this->record = $setting;
            $this->fillForm();
        }
    }
}
