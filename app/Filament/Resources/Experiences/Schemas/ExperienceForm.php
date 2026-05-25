<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ExperienceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('company')
                    ->required(),
                TextInput::make('period')
                    ->required(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
