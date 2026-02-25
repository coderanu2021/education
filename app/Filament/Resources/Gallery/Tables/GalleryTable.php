<?php

namespace App\Filament\Resources\Gallery\Tables;

use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class GalleryTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Image')
                    ->disk('uploads')
                    ->visibility('public')
                    ->size(100),

                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('description')
                    ->label('Description')
                    ->limit(50)
                    ->placeholder('No description'),

                TextColumn::make('order')
                    ->label('Order')
                    ->sortable(),

                ToggleColumn::make('is_active')
                    ->label('Active')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('order', 'asc')
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Active Status')
                    ->placeholder('All images')
                    ->trueLabel('Active only')
                    ->falseLabel('Inactive only'),
            ]);
    }
}
