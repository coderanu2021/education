<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([
                FileUpload::make('image')
                    ->label('Banner Image')
                    ->image()
                    ->required()
                    ->disk('uploads')
                    ->directory('banners')
                    ->visibility('public')
                    ->saveUploadedFileUsing(function ($file, $record) {
                        $filename = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/banners'), $filename);
                        return 'uploads/banners/' . $filename;
                    })
                    ->maxSize(5120)
                    ->imageEditor()
                    ->helperText('Upload banner image (recommended size: 1920x780px)')
                    ->columnSpanFull(),

                TextInput::make('link')
                    ->label('Link URL (Optional)')
                    ->url()
                    ->placeholder('https://example.com')
                    ->helperText('Add a link if you want the banner to be clickable'),

                TextInput::make('order')
                    ->label('Display Order')
                    ->numeric()
                    ->default(0)
                    ->required()
                    ->helperText('Lower numbers appear first'),

                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true)
                    ->helperText('Only active banners will be displayed on the website'),
            ]);
    }
}
