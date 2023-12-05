<?php

namespace App\Filament\Resources\ThematicResource\Pages;

use App\Filament\Resources\ThematicResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditThematic extends EditRecord
{
    protected static string $resource = ThematicResource::class;

    protected function getActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
