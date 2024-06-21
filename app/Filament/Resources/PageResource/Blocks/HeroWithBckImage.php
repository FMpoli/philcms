<?php

namespace App\Filament\Resources\PageResource\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use TomatoPHP\FilamentIcons\Components\IconPicker;
use Illuminate\Support\HtmlString;


class HeroWithBckImage
{
    public static function make(): Block
        {
        return Block::make('hero-with-bck-image')
            ->icon('heroicon-m-photo')
            ->preview('filament.content.blocks-previews.herobckimage')
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->placeholder('Enter the title')
                    ->required(),
                TextInput::make('subtitle')
                    ->label('Sub title')
                    ->placeholder('Enter the subtitle'),
                FileUpload::make('media')
                    ->required(),
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
                    ->maxItems(1)
                    ->minItems(0)
                    ->columns(2),

            ]);
    }
}
