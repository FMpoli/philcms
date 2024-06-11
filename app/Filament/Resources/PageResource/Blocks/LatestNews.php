<?php

namespace App\Filament\Resources\PageResource\Blocks;
use Filament\Forms\Components\Builder\Block;

class LatestNews
{
    public static function getBlockSchema(): Block
    {
        return Block::make('latest-news')
            ->icon('heroicon-m-newspaper')
            ->schema([
                //
            ]);
    }

}