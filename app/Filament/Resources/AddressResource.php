<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AddressResource\Pages;
use App\Filament\Resources\AddressResource\RelationManagers\CityRelationManager;
use App\Models\Address;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AddressResource extends Resource
{
    protected static ?string $model = Address::class;

    protected static ?string $slug = 'addresses';

    protected static ?string $recordTitleAttribute = 'id';

    protected static ?string $navigationIcon = 'entypo-address';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('address_line_1')
                ->required(),

            TextInput::make('address_line_2'),

            TextInput::make('latitude')
                ->numeric(),

            TextInput::make('longitude')
                ->numeric(),

            TextInput::make('zip_code'),

            Select::make('city_id')
                ->relationship('city', 'name')
                ->searchable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('address_line_1'),

            TextColumn::make('address_line_2'),

            TextColumn::make('latitude'),

            TextColumn::make('longitude'),

            TextColumn::make('zip_code'),

            TextColumn::make('city.name'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAddresses::route('/'),
            'create' => Pages\CreateAddress::route('/create'),
            'edit' => Pages\EditAddress::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }
}
