<?php

namespace App\Filament\Resources\PageResource\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;

class Anchor
{
    public static function make(): Block
    {
        return Block::make('anchor')
            ->icon('heroicon-m-link')
            ->schema([
                TextInput::make('anchor')
                    ->label('Anchor')
                    ->placeholder('Example: #about'),
            ]);
    }
}