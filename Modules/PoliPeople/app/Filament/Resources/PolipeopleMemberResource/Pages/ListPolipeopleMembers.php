<?php

namespace Modules\PoliPeople\Filament\Resources\PolipeopleMemberResource\Pages;

use Modules\PoliPeople\Filament\Resources\PolipeopleMemberResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPolipeopleMembers extends ListRecords
{
    protected static string $resource = PolipeopleMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
