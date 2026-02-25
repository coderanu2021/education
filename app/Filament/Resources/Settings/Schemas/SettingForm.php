<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                // General Settings
                TextInput::make('site_name')
                    ->label('Site Name')
                    ->required()
                    ->default('CSA Education')
                    ->maxLength(255)
                    ->columnSpanFull(),

                Textarea::make('site_description')
                    ->label('Site Description')
                    ->rows(3)
                    ->maxLength(500)
                    ->columnSpanFull(),

                FileUpload::make('logo')
                    ->label('Main Logo')
                    ->image()
                    ->directory('settings')
                    ->maxSize(2048)
                    ->imageEditor()
                    ->helperText('Recommended size: 200x60px')
                    ->columnSpan(1),

                FileUpload::make('footer_logo')
                    ->label('Footer Logo')
                    ->image()
                    ->directory('settings')
                    ->maxSize(2048)
                    ->imageEditor()
                    ->helperText('Recommended size: 200x60px')
                    ->columnSpan(1),

                FileUpload::make('favicon')
                    ->label('Favicon')
                    ->image()
                    ->directory('settings')
                    ->maxSize(512)
                    ->helperText('Recommended size: 32x32px or 64x64px')
                    ->columnSpan(1),

                // Contact Information
                TextInput::make('email')
                    ->label('Email Address')
                    ->email()
                    ->maxLength(255)
                    ->columnSpan(1),

                TextInput::make('phone')
                    ->label('Phone Number')
                    ->tel()
                    ->maxLength(255)
                    ->columnSpan(1),

                Textarea::make('address')
                    ->label('Street Address')
                    ->rows(2)
                    ->maxLength(500)
                    ->columnSpanFull(),

                TextInput::make('city')
                    ->label('City')
                    ->maxLength(255)
                    ->columnSpan(1),

                TextInput::make('state')
                    ->label('State/Province')
                    ->maxLength(255)
                    ->columnSpan(1),

                TextInput::make('country')
                    ->label('Country')
                    ->maxLength(255)
                    ->columnSpan(1),

                TextInput::make('postal_code')
                    ->label('Postal Code')
                    ->maxLength(20)
                    ->columnSpan(1),

                // Social Media
                TextInput::make('facebook_url')
                    ->label('Facebook URL')
                    ->url()
                    ->placeholder('https://facebook.com/yourpage')
                    ->maxLength(255)
                    ->columnSpan(1),

                TextInput::make('twitter_url')
                    ->label('Twitter URL')
                    ->url()
                    ->placeholder('https://twitter.com/yourhandle')
                    ->maxLength(255)
                    ->columnSpan(1),

                TextInput::make('linkedin_url')
                    ->label('LinkedIn URL')
                    ->url()
                    ->placeholder('https://linkedin.com/company/yourcompany')
                    ->maxLength(255)
                    ->columnSpan(1),

                TextInput::make('instagram_url')
                    ->label('Instagram URL')
                    ->url()
                    ->placeholder('https://instagram.com/yourhandle')
                    ->maxLength(255)
                    ->columnSpan(1),

                TextInput::make('youtube_url')
                    ->label('YouTube URL')
                    ->url()
                    ->placeholder('https://youtube.com/yourchannel')
                    ->maxLength(255)
                    ->columnSpan(1),

                // Theme Colors
                ColorPicker::make('primary_color')
                    ->label('Primary Color')
                    ->default('#1db6c5')
                    ->helperText('Main brand color used throughout the site')
                    ->columnSpan(1),

                ColorPicker::make('secondary_color')
                    ->label('Secondary Color')
                    ->default('#001848')
                    ->helperText('Secondary brand color for accents')
                    ->columnSpan(1),

                ColorPicker::make('accent_color')
                    ->label('Accent Color')
                    ->helperText('Optional accent color for highlights')
                    ->columnSpan(1),

                // Footer
                Textarea::make('footer_text')
                    ->label('Footer Description')
                    ->rows(3)
                    ->maxLength(500)
                    ->helperText('Text displayed in the footer')
                    ->columnSpanFull(),

                TextInput::make('copyright_text')
                    ->label('Copyright Text')
                    ->maxLength(255)
                    ->placeholder('© 2026 CSA Education. All Rights Reserved.')
                    ->helperText('Leave empty to use default')
                    ->columnSpanFull(),
            ]);
    }
}
