<?php

namespace App\Filament\Resources\ThematicResource\Pages;

use App\Filament\Resources\ThematicResource;
use Filament\Resources\Pages\CreateRecord;

class CreateThematic extends CreateRecord
{
    protected static string $resource = ThematicResource::class;

    protected function getActions(): array
    {
        return [

        ];
    }
}
