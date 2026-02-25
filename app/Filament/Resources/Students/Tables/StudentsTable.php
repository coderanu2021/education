<?php

namespace App\Filament\Resources\Students\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;

class StudentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')
                    ->searchable()
                    ->sortable()
                    ->label('Full Name'),
                
                TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->copyable(),
                
                TextColumn::make('phone')
                    ->searchable()
                    ->label('Phone'),
                
                TextColumn::make('course.title')
                    ->searchable()
                    ->sortable()
                    ->label('Course'),
                
                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'approved',
                        'danger' => 'rejected',
                    ])
                    ->sortable(),
                
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Registered At')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ]),
                
                SelectFilter::make('course_id')
                    ->relationship('course', 'title')
                    ->label('Course'),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
