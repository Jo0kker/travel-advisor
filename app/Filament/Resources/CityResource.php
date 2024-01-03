<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CityResource\Pages;
use App\Models\City;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CityResource extends Resource
{
    protected static ?string $model = City::class;

    protected static ?string $slug = 'cities';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'bxs-city';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->required(),
            Select::make('country_id')
                ->relationship('country', 'name')
                ->required(),
            SpatieMediaLibraryFileUpload::make('media')
                ->collection('city_media')
                ->multiple()->reorderable()->responsiveImages()
                ->visibility('public')->imageEditor()
                ->rules('mimes:png,jpg,jpeg'),

            Toggle::make('is_active')
                ->label('Est actif ?')
                ->disabled(!auth()->user()->hasRole('admin'))
                ->default(false),

            RichEditor::make('content')->columnSpanFull()
                ->label('Contenu')
                ->fileAttachmentsDirectory('activity_content')
                ->fileAttachmentsVisibility('public')
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')
                ->searchable()
                ->sortable(),

            TextColumn::make('country.name')
                ->searchable()
                ->sortable(),

            TextColumn::make('is_active')
                ->sortable()
                ->label('Est actif ?'),

            TextColumn::make('owner.name')
                ->searchable()
                ->sortable()
                ->label('Propriétaire'),
        ])->filters([
            TrashedFilter::make(),
        ])->actions([
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ])->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ]),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCities::route('/'),
            'create' => Pages\CreateCity::route('/create'),
            'edit' => Pages\EditCity::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
