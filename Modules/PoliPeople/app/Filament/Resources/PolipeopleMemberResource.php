<?php

namespace Modules\PoliPeople\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Modules\PoliPeople\Models\PolipeopleMember;
use Modules\PoliPeople\Models\PolipeopleTeam;
use TomatoPHP\FilamentIcons\Components\IconPicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\PoliPeople\Filament\Resources\PolipeopleMemberResource\Pages;
use Modules\PoliPeople\Filament\Resources\PolipeopleMemberResource\RelationManagers;

class PolipeopleMemberResource extends Resource
{
    protected static ?string $model = PolipeopleMember::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'People';

    protected static ?string $modelLabel = 'Member';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make(__('members.member'))
                        ->schema([
                            TextInput::make('name')
                                ->label(__('members.name'))
                                ->required()
                                ->live(debounce: 500)
                                ->autocapitalize('words')
                                ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                    $name = $state;
                                    $lastName = $get('last_name');
                                    $slug = Str::slug($name . ' ' . $lastName);
                                    $set('slug', $slug);
                                })
                                ->maxLength(255),

                            TextInput::make('last_name')
                                ->label(__('members.last_name'))
                                ->required()
                                ->live(debounce: 500)
                                ->autocapitalize('words')
                                ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                    $name = $get('name');
                                    $lastName = $state;
                                    $slug = Str::slug($name . ' ' . $lastName);
                                    $set('slug', $slug);
                                })
                                ->maxLength(255),
                            Forms\Components\TextInput::make('slug')
                                ->label(__('members.slug'))
                                ->required()
                                ->maxLength(255),
                            Forms\Components\Textarea::make('bio')
                                ->label(__('members.bio'))
                                ->columnSpanFull(),

                            Forms\Components\Toggle::make('is_published')
                                ->label(__('members.is_published'))
                                ->required(),
                        ])->columns(3),

                    ])->columnSpan(2),
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\CheckboxList::make('teams')
                                ->options(PolipeopleTeam::pluck('name')->toArray())
                                ->label(__('members.teams'))
                                ->relationship(name: 'teams', titleAttribute: 'name')
                                ->columns(2)
                                ->required(),
                        Forms\Components\Repeater::make('links')
                            ->label(__('members.links'))
                            ->collapsible()
                            ->collapsed()
                            ->itemLabel(fn (array $state): ?string => $state['link_text'] ?? null)
                            ->schema([
                                Forms\Components\TextInput::make('link_text')
                                    ->label(__('members.link_text'))
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('url')
                                    ->label(__('members.url'))
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Toggle::make('is_new_tab')
                                    ->label(__('members.open_new_tab')),
                                IconPicker::make('icon')
                                    ->label(__('members.icon'))
                                    ->default('heroicon-o-academic-cap')
                                    ->label('Icon'),
                            ]),

                    ])->columnSpan(1)
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('handle')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPolipeopleMembers::route('/'),
            'create' => Pages\CreatePolipeopleMember::route('/create'),
            'edit' => Pages\EditPolipeopleMember::route('/{record}/edit'),
        ];
    }
}
