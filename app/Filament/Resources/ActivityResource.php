<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityResource\Pages;
use App\Filament\Resources\ActivityResource\RelationManagers\AddressRelationManager;
use App\Filament\Resources\ActivityResource\RelationManagers\SeasonsRelationManager;
use App\Filament\Resources\ActivityResource\RelationManagers\ThematicsRelationManager;
use App\Models\Activity;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static ?string $slug = 'activities';

    protected static ?string $navigationIcon = 'gmdi-sports-bar-o';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->required(),

            TextInput::make('description'),

            SpatieMediaLibraryFileUpload::make('media')
                ->collection('activity_media')
                ->multiple()->reorderable()->responsiveImages()
                ->visibility('public')->imageEditor()
                ->rules('mimes:png,jpg,jpeg'),

            Select::make('address_id')
                ->relationship('address', 'address_line_1')
                ->searchable(),

            Select::make('seasons')
                ->relationship('seasons', 'name')
                ->multiple()
                ->searchable()->createOptionForm([
                    TextInput::make('name')
                        ->required(),
                ]),

            Select::make('thematics')
                ->relationship('thematics', 'name')
                ->multiple()
                ->searchable()->createOptionForm([
                    TextInput::make('name')
                        ->required(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')
                ->searchable()
                ->sortable(),

            TextColumn::make('description'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActivities::route('/'),
            'create' => Pages\CreateActivity::route('/create'),
            'edit' => Pages\EditActivity::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }

    public static function getRelations(): array
    {
        return [
            AddressRelationManager::class,
            SeasonsRelationManager::class,
            ThematicsRelationManager::class
        ];
    }
}
