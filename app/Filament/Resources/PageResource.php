<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Tabs;

use Filament\Tables\Columns\TextColumn;

use Filament\Forms\Set;
use Filament\Forms\Get;
use Illuminate\Support\Str;
use Filament\Forms\Components\Actions\Action;

use App\Filament\Resources\PageResource\Blocks\Anchor;
use App\Filament\Resources\PageResource\Blocks\CallToAction;
use App\Filament\Resources\PageResource\Blocks\Faq;
use App\Filament\Resources\PageResource\Blocks\Features;
use App\Filament\Resources\PageResource\Blocks\HeroWithBckImage;
use App\Filament\Resources\PageResource\Blocks\HeroWithBckVideo;
use App\Filament\Resources\PageResource\Blocks\HeroWithImage;
use App\Filament\Resources\PageResource\Blocks\HeroWithVideo;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Tabs::make('Tabs')
                ->tabs([
                    Tabs\Tab::make('Details')
                        ->schema([
                            TextInput::make('title')
                                ->label('Page title')
                                ->maxLength(255)
                                ->live(debounce: 500)
                                ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                    if (($get('slug') ?? '') !== Str::slug($old)) {
                                        return;
                                    }
                                
                                    $set('slug', Str::slug($state));
                                })
                                ->required(),
                            TextInput::make('slug')
                                ->label('slug')
                                ->required()
                                ->maxLength(255)
                                ->unique(Page::class, 'slug'),
                                
                            Toggle::make('is_published')
                                ->label('Published')
                                ->default(true),
                            ]),
                    Tabs\Tab::make('Content')
                        ->schema([
                            Builder::make('content')
                                ->blockNumbers(false)
                                ->addActionLabel('Add a new block')
                                ->reorderableWithButtons()
                                ->collapsed()
                                ->cloneable()
                                ->blockPickerColumns(2)
                                ->blockPickerWidth('2xl')
                                ->deleteAction(
                                    fn (Action $action) => $action->requiresConfirmation(),
                                )
                                ->blockPreviews()
                                ->blocks([
                                    Anchor::make(),
                                    CallToAction::make(),
                                    Faq::make(),
                                    Features::make(),
                                    HeroWithBckImage::make(),
                                    HeroWithBckVideo::make(),
                                    HeroWithImage::make(),
                                    HeroWithVideo::make(),
                                
                            ]),
                        ]),
                    Tabs\Tab::make('SEO')
                        ->schema([
                            TextInput::make('meta_title')
                                ->label('meta title')
                                ->maxLength(255),
                            Textarea::make('meta_description')
                                ->label('meta description')
                                ->maxLength(255),
                        ]),
                ])
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                   
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'view' => Pages\ViewPage::route('/{record}'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): EloquentBuilder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
