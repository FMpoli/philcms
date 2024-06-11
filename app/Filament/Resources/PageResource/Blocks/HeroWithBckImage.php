<?php

namespace App\Filament\Resources\PageResource\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Guava\FilamentIconPicker\Forms\IconPicker;
use Guava\FilamentIconPicker\Layout;
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
                            ]),
                    ])
                    ->maxItems(1)
                    ->minItems(0)
                    ->columns(2),   
                            
            ]);
    }
}