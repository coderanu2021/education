<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\TextInput;
use Filament\Schemas\Components\Select;
use Filament\Schemas\Components\DatePicker;
use Filament\Schemas\Components\Textarea;
use Filament\Schemas\Components\Section;
use App\Models\Course;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Personal Information')
                    ->schema([
                        TextInput::make('full_name')
                            ->required()
                            ->maxLength(255)
                            ->label('Full Name'),
                        
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        
                        TextInput::make('phone')
                            ->tel()
                            ->required()
                            ->maxLength(20),
                        
                        DatePicker::make('date_of_birth')
                            ->label('Date of Birth')
                            ->maxDate(now()),
                        
                        Select::make('gender')
                            ->options([
                                'male' => 'Male',
                                'female' => 'Female',
                                'other' => 'Other',
                            ]),
                        
                        TextInput::make('qualification')
                            ->maxLength(255),
                    ])
                    ->columns(2),
                
                Section::make('Address & Course')
                    ->schema([
                        Textarea::make('address')
                            ->rows(3)
                            ->columnSpanFull(),
                        
                        Select::make('course_id')
                            ->label('Course')
                            ->options(Course::all()->pluck('title', 'id'))
                            ->searchable()
                            ->required(),
                        
                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'approved' => 'Approved',
                                'rejected' => 'Rejected',
                            ])
                            ->default('pending')
                            ->required(),
                    ])
                    ->columns(2),
            ]);
    }
}
