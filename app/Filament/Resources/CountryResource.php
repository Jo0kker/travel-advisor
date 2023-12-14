<?php

namespace App\Filament\Resources;

use App\Filament\Resources\countryResource\Pages;
use App\Filament\Resources\CountryResource\RelationManagers\CitiesRelationManager;
use App\Models\Country;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
            SpatieMediaLibraryFileUpload::make('media')
                ->multiple()->reorderable()
                ->customProperties(['zip_filename_prefix' => 'countries/'])
                ->directory('countries')
                ->visibility('public')
                ->imageEditor()
                ->rules('mimes:png,jpg,jpeg')
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')
                ->searchable()
                ->sortable(),
        ])->filters([
            TrashedFilter::make(),
        ])->actions([
            Tables\Actions\DeleteAction::make(),
            Tables\Actions\ForceDeleteAction::make(),
            Tables\Actions\RestoreAction::make(),
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
