<?php

namespace App\Filament\Resources\PageResource\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
// use Awcodes\Curator\Components\Forms\CuratorPicker;
use Guava\FilamentIconPicker\Forms\IconPicker;
use Guava\FilamentIconPicker\Layout;
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
                // CuratorPicker::make('video_thumbnail')
                //     ->label('Video thumbnail'),
                Repeater::make('buttons')
                    ->schema([
                        TextInput::make('button_text')
                            ->label('Button text')
                            ->placeholder('Enter the button text'),
                        TextInput::make('button_url')
                            ->label('Button url')
                            ->placeholder('Enter the button url'),
                        IconPicker::make('icon')
                            ->layout(Layout::ON_TOP)
                            ->label('Icon')
                            ->preload()
                            ->helperText(new HtmlString('Select an icon from <a class="underline" href="https://heroicons.com/" target="_blank">Heroicons</a>'))                            
                            ->columns([
                                'default' => 3,
                                'lg' => 3,
                                '2xl' => 5,
                            ])
                    ])
                    ->minItems(0)
                    ->maxItems(2)
                    ->columns(2),
            ]);
    }
}