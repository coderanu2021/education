<?php

namespace App\Filament\Resources\Certificates\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CertificateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('student_name')
                    ->required(),
                \Filament\Forms\Components\Select::make('course_id')
                    ->relationship('course', 'title')
                    ->required()
                    ->searchable()
                    ->preload(),
                TextInput::make('certificate_code')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->default(fn () => 'CERT-' . strtoupper(str()->random(8))),
                Textarea::make('certificate_note')
                    ->placeholder('Add a special note to the certificate...')
                    ->columnSpanFull(),
                DatePicker::make('issue_date')
                    ->default(now())
                    ->required(),
            ]);
    }
}
