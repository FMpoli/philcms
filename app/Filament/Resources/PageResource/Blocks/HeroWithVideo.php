<?php

namespace App\Filament\Resources\PageResource\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use TomatoPHP\FilamentIcons\Components\IconPicker;
use Illuminate\Support\HtmlString;

class HeroWithVideo
{
    public static function make(): Block
    {
        return Block::make('hero-with-video')

            ->icon('heroicon-m-video-camera')
            ->preview('filament.content.blocks-previews.herovideo')
            ->schema([
                TextInput::make('title'),
                TextInput::make('subtitle'),
                FileUpload::make('video')
                    ->label('Video')
                    ->placeholder('Upload the video file'),
                ToggleButtons::make('video_position')
                    ->label('Video position')
                    ->default('left')
                    ->inline()
                    ->options([
                        'left' => 'Left',
                        'right' => 'Right'
                    ]),
                CuratorPicker::make('video_thumbnail')
                    ->label('Video thumbnail'),
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
