<?php

namespace App\Filament\Resources\PageResource\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\ToggleButtons;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms\Components\ColorPicker;
class TextWithImage
{

    public static function make(): Block
    {
        return Block::make('text-with-image')
            ->icon('heroicon-m-photo')
            ->preview('filament.content.blocks-previews.textimage')
            ->schema([

                RichEditor::make('content')
                    ->label('Content')
                    ->placeholder('Enter the content'),
                CuratorPicker::make('media'),
                ColorPicker::make('background_color'),
                ToggleButtons::make('image_position')
                    ->label('Image position')
                    ->default('left')
                    ->inline()
                    ->options([
                        'left' => 'Left',
                        'right' => 'Right'
                    ]),
            ]);
    }
}
