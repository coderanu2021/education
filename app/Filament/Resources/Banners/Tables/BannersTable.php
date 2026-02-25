<?php

namespace App\Filament\Resources\Banners\Tables;

use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class BannersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Banner')
                    ->disk('uploads')
                    ->visibility('public')
                    ->size(150)
                    ->defaultImageUrl(url('/images/slides/slider-mainbg-001.jpg')),

                TextColumn::make('link')
                    ->label('Link')
                    ->limit(50)
                    ->placeholder('No link'),

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
                    ->placeholder('All banners')
                    ->trueLabel('Active only')
                    ->falseLabel('Inactive only'),
            ]);
    }
}
