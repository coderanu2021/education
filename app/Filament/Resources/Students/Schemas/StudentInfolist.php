<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;

class StudentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextEntry::make('full_name')
                    ->label('Full Name'),
                
                TextEntry::make('email'),
                
                TextEntry::make('phone'),
                
                TextEntry::make('date_of_birth')
                    ->date()
                    ->label('Date of Birth'),
                
                TextEntry::make('gender')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'male' => 'info',
                        'female' => 'success',
                        'other' => 'warning',
                        default => 'gray',
                    }),
                
                TextEntry::make('qualification'),
                
                TextEntry::make('course.title')
                    ->label('Course'),
                
                TextEntry::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                        default => 'gray',
                    }),
                
                TextEntry::make('address')
                    ->columnSpanFull(),
                
                TextEntry::make('created_at')
                    ->dateTime()
                    ->label('Registered At'),
                
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->label('Last Updated'),
            ]);
    }
}
