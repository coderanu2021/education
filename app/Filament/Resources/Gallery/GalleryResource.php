<?php

namespace App\Filament\Resources\Gallery;

use App\Filament\Resources\Gallery\Pages;
use App\Filament\Resources\Gallery\Schemas\GalleryForm;
use App\Filament\Resources\Gallery\Tables\GalleryTable;
use App\Models\Gallery;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static string|UnitEnum|null $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'Gallery';

    public static function form(Schema $schema): Schema
    {
        return GalleryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GalleryTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGallery::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
