<?php

namespace App\Filament\Resources\Courses\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, \Filament\Forms\Set $set) => $operation === 'create' ? $set('slug', str($state)->slug()) : null),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                Textarea::make('summary')
                    ->rows(3)
                    ->columnSpanFull(),
                \Filament\Forms\Components\RichEditor::make('description')
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->default(0.0)
                    ->prefix('$'),
                FileUpload::make('image')
                    ->image()
                    ->directory('courses'),
                TextInput::make('duration')
                    ->placeholder('e.g. 4 Weeks or 20 Hours'),
                \Filament\Forms\Components\Select::make('level')
                    ->options([
                        'Beginner' => 'Beginner',
                        'Intermediate' => 'Intermediate',
                        'Advanced' => 'Advanced',
                    ])
                    ->required(),
                \Filament\Forms\Components\Repeater::make('features')
                    ->simple(
                        TextInput::make('feature')->required(),
                    )
                    ->columnSpanFull(),
            ]);
    }
}
