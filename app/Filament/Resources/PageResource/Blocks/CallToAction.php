<?php

namespace App\Filament\Resources\PageResource\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use TomatoPHP\FilamentIcons\Components\IconPicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\ColorPicker;
class CallToAction
{
    public static function make(): Block
    {
        return Block::make('call-to-action')
            ->label('Call to action')
            ->icon('heroicon-m-bolt')
            ->preview('filament.content.blocks-previews.cta')
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->placeholder('Enter the title')
                    ->required(),
                TextInput::make('description')
                    ->label('Description')
                    ->placeholder('Enter text description')
                    ->required(),
                ColorPicker::make('background_color'),
                Repeater::make('buttons')
                    ->schema([
                        TextInput::make('text')
                            ->label('Button text')
                            ->placeholder('Enter the button text'),
                        TextInput::make('url')
                            ->label('Button url')
                            ->placeholder('Enter the button url'),
                        IconPicker::make('icon')
                            ->default('heroicon-o-academic-cap')
                            ->label('Icon'),
                    ])
                    ->minItems(0)
                    ->maxItems(2)
                    ->columns(2),
            ]);
    }
}
