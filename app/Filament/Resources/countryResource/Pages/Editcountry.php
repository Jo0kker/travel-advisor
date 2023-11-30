<?php

namespace App\Filament\Resources\countryResource\Pages;

use App\Filament\Resources\countryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class Editcountry extends EditRecord
{
    protected static string $resource = countryResource::class;

    protected function getActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
