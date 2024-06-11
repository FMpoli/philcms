<?php

namespace App\Filament\Resources\PageResource\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Guava\FilamentIconPicker\Forms\IconPicker;
use Guava\FilamentIconPicker\Layout;
use Illuminate\Support\HtmlString;

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
                Repeater::make('features')
                    ->schema([                     
                        TextInput::make('feature_title')
                            ->columnspan(2)
                            ->label('Feature Title'),
                        Textarea::make('feature_description')
                            ->label('Feature Description'),
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
                    ->columns(2),
            ]);
    }
}