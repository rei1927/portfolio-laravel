<?php

namespace App\Filament\Resources\Certifications\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CertificationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('institution')
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
