<?php

namespace App\Filament\Resources;

use App\Filament\Resources\countryResource\Pages;
use App\Filament\Resources\CountryResource\RelationManagers\CitiesRelationManager;
use App\Filament\Resources\CountryResource\RelationManagers\CityRelationManager;
use App\Models\Country;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CountryResource extends Resource
{
    protected static ?string $model = Country::class;

    protected static ?string $slug = 'countries';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'bx-world';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')
                ->searchable()
                ->sortable(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\Listcountries::route('/'),
            'create' => Pages\Createcountry::route('/create'),
            'edit' => Pages\Editcountry::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }

    public static function getRelations(): array
    {
        return [
            CitiesRelationManager::class
        ];
    }
}
