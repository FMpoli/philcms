<?php

namespace App\Filament\Resources\PageResource\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;

class CallToAction
{
    public static function make(): Block
    {
        return Block::make('call-to-action')
            ->label('Call to action')
            ->icon('heroicon-m-bolt')
            
            ->schema([
                TextInput::make('title')
                    ->label('Title')
                    ->placeholder('Enter the title')
                    ->required(),
                TextInput::make('description')
                    ->label('Description')
                    ->placeholder('Enter text description')
                    ->required(),
                TextInput::make('button_text')
                    ->label('Button text')
                    ->placeholder('Enter the button text')
                    ->required(),
                TextInput::make('button_url')
                    ->label('Button url')
                    ->placeholder('Enter the button url')
                    ->required(),
            ]);
    }
}