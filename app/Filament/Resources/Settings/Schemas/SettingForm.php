<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('headline')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('cv_link')
                    ->url()
                    ->required(),
                FileUpload::make('profile_photo')
                    ->image()
                    ->directory('uploads')
                    ->nullable(),
                FileUpload::make('second_photo')
                    ->image()
                    ->directory('uploads')
                    ->nullable(),
            ]);
    }
}
