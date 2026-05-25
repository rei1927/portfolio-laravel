<?php

namespace App\Filament\Resources\Skills\Schemas;

use Filament\Schemas\Schema;

class SkillForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('subtitle')
                    ->maxLength(255),
                \Filament\Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                \Filament\Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                \Filament\Forms\Components\TagsInput::make('tools')
                    ->separator(',')
                    ->columnSpanFull(),
                \Filament\Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0),
            ]);
    }
}
