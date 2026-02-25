<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use App\Models\Course;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('full_name')
                    ->required()
                    ->maxLength(255)
                    ->label('Full Name')
                    ->columnSpan(1),
                
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->columnSpan(1),
                
                TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(20)
                    ->columnSpan(1),
                
                DatePicker::make('date_of_birth')
                    ->label('Date of Birth')
                    ->maxDate(now())
                    ->columnSpan(1),
                
                Select::make('gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                        'other' => 'Other',
                    ])
                    ->columnSpan(1),
                
                TextInput::make('qualification')
                    ->maxLength(255)
                    ->columnSpan(1),
                
                Textarea::make('address')
                    ->rows(3)
                    ->columnSpanFull(),
                
                Select::make('course_id')
                    ->label('Course')
                    ->options(Course::all()->pluck('title', 'id'))
                    ->searchable()
                    ->required()
                    ->columnSpan(1),
                
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])
                    ->default('pending')
                    ->required()
                    ->columnSpan(1),
            ]);
    }
}
