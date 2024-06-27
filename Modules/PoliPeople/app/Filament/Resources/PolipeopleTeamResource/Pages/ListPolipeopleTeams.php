<?php

namespace Modules\PoliPeople\Filament\Resources\PolipeopleTeamResource\Pages;

use Modules\PoliPeople\Filament\Resources\PolipeopleTeamResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPolipeopleTeams extends ListRecords
{
    protected static string $resource = PolipeopleTeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
