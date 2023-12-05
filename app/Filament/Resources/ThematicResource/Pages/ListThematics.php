<?php

namespace App\Filament\Resources\ThematicResource\Pages;

use App\Filament\Resources\ThematicResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListThematics extends ListRecords
{
    protected static string $resource = ThematicResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
