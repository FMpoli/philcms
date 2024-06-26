<?php

namespace App\Filament\Resources\PageResource\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\FileUpload;
use TomatoPHP\FilamentIcons\Components\IconPicker;

class HeroWithBckVideo
{
    public static function make(): Block
    {
        return Block::make('hero-with-bck-video')
            ->icon('heroicon-m-video-camera')
            ->preview('filament.content.blocks-previews.herobckvideo')
            ->schema([
                TextInput::make('title'),
                TextInput::make('subtitle'),
                FileUpload::make('video')
                    ->label('Video')
                    ->placeholder('Upload the video file'),
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
                    ->maxItems(1)
                    ->columns(2),
            ]);
    }
}
