<?php

namespace App\Filament\Resources\PageResource\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;

class faq
{
    public static function make(): Block
    {
        return Block::make('faq')
            ->icon('heroicon-m-queue-list')
            ->preview('filament.content.blocks-previews.faq')
            ->schema([
                TextInput::make('title')
                            ->label('Title')
                            ->placeholder('Frequently asked questions')
                            ->columnSpan(2)
                            ->required(),
                Repeater::make('faq')
                    ->schema([
                        TextInput::make('question')
                            ->label('Question')
                            ->placeholder('What is the question?'),
                        TextInput::make('answer')
                            ->label('Answer')
                            ->placeholder('What is the answer?')
                    ])
                    ->minItems(0)
                    ->columns(2),
            ]);
    }
}