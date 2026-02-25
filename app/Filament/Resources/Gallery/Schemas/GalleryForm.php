<?php

namespace App\Filament\Resources\Gallery\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->schema([
                TextInput::make('title')
                    ->label('Image Title')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(1),

                TextInput::make('order')
                    ->label('Display Order')
                    ->numeric()
                    ->default(0)
                    ->required()
                    ->helperText('Lower numbers appear first')
                    ->columnSpan(1),

                FileUpload::make('image')
                    ->label('Gallery Image')
                    ->image()
                    ->required()
                    ->disk('uploads')
                    ->directory('gallery')
                    ->visibility('public')
                    ->maxSize(5120)
                    ->imageEditor()
                    ->helperText('Upload gallery image (recommended size: 800x600px)')
                    ->columnSpanFull(),

                Textarea::make('description')
                    ->label('Description')
                    ->rows(3)
                    ->maxLength(500)
                    ->helperText('Optional description for the image')
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true)
                    ->helperText('Only active images will be displayed in gallery')
                    ->columnSpanFull(),
            ]);
    }
}
