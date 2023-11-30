<?php

namespace App\Filament\Resources\countryResource\Pages;

use App\Filament\Resources\countryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class Listcountries extends ListRecords
{
    protected static string $resource = countryResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
