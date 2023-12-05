<?php

namespace App\Filament\Resources\CountryResource\Pages;

use App\Filament\Resources\CountryResource;
use Filament\Resources\Pages\CreateRecord;

class Createcountry extends CreateRecord
{
    protected static string $resource = CountryResource::class;

    protected function getActions(): array
    {
        return [

        ];
    }
}
