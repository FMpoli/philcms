<?php

namespace App\Filament\Resources\PageResource\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use TomatoPHP\FilamentIcons\Components\IconPicker;
use Filament\Forms\Components\ColorPicker;

class features
{
    public static function make(): Block    {
        return Block::make('features')
            ->icon('heroicon-m-queue-list')
            ->preview('filament.content.blocks-previews.features')
            ->schema([
                TextInput::make('title')
                        ->label('Title')
                        ->required(),
                TextInput::make('subtitle')
                        ->label('Sub title')
                        ->required(),
                ColorPicker::make('background_color'),
                Repeater::make('features')
                    ->schema([
                        TextInput::make('title')
                            ->columnspan(2)
                            ->label('Feature Title'),
                        Textarea::make('description')
                            ->label('Feature Description'),
                        IconPicker::make('icon')
                            ->default('heroicon-o-academic-cap')
                            ->label('Icon'),
                    ])
                    ->minItems(0)
                    ->columns(2),
            ]);
    }
}
