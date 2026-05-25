<?php

namespace App\Filament\Resources\PortfolioItems\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class PortfolioItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Select::make('category')
                    ->options([
                        'web-ui-ux' => 'Web & UI/UX',
                        'graphic-design' => 'Graphic Design',
                        'video-motion' => 'Video / Motion',
                    ])
                    ->required(),
                FileUpload::make('image_path')
                    ->image()
                    ->directory('uploads')
                    ->nullable(),
                TextInput::make('video_id')
                    ->nullable(),
                Select::make('video_type')
                    ->options([
                        'youtube' => 'YouTube',
                        'vimeo' => 'Vimeo',
                    ])
                    ->nullable(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
