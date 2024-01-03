<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AddressResource\Pages;
use App\Models\Address;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                ->label('Adresse 1')
                ->required(),

            TextInput::make('address_line_2')
                ->label('Adresse 2'),

            TextInput::make('latitude')
                ->numeric(),

            TextInput::make('longitude')
                ->numeric(),

            TextInput::make('zip_code'),

            Select::make('city_id')
                ->relationship('city', 'name')
                ->searchable(),

            SpatieMediaLibraryFileUpload::make('media')
                ->collection('address_media')
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
            TextColumn::make('address_line_1')->label('Adresse 1'),

            TextColumn::make('address_line_2')->label('Adresse 2'),

            TextColumn::make('owner.name')->label('Propriétaire'),

            TextColumn::make('zip_code'),

            TextColumn::make('city.name'),
        ])->filters([
            Tables\Filters\TrashedFilter::make(),
        ])->actions([
            Tables\Actions\DeleteAction::make(),
            Tables\Actions\ForceDeleteAction::make(),
            Tables\Actions\RestoreAction::make(),
        ])
            ->bulkActions([
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
            'index' => Pages\ListAddresses::route('/'),
            'create' => Pages\CreateAddress::route('/create'),
            'edit' => Pages\EditAddress::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
