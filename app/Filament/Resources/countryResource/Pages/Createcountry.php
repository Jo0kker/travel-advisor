<?php

namespace App\Filament\Resources\countryResource\Pages;

use App\Filament\Resources\countryResource;
use Filament\Resources\Pages\CreateRecord;

class Createcountry extends CreateRecord
{
    protected static string $resource = countryResource::class;

    protected function getActions(): array
    {
        return [

        ];
    }
}
