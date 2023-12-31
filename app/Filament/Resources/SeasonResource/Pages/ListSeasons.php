<?php

namespace App\Filament\Resources\SeasonResource\Pages;

use App\Filament\Resources\SeasonResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSeasons extends ListRecords
{
    protected static string $resource = SeasonResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
