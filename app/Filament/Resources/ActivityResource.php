<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityResource\Pages;
use App\Filament\Resources\ActivityResource\RelationManagers\AddressRelationManager;
use App\Filament\Resources\ActivityResource\RelationManagers\SeasonsRelationManager;
use App\Filament\Resources\ActivityResource\RelationManagers\ThematicsRelationManager;
use App\Models\Activity;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                ->columnSpanFull()->label('Images')
                ->collection('activity_media')
                ->multiple()->reorderable()->responsiveImages()
                ->visibility('public')->imageEditor()
                ->rules('mimes:png,jpg,jpeg'),

            Select::make('address_id')->label('Adresse')
                ->relationship('address', 'address_line_1')
                ->searchable(),

            Select::make('seasons')->label('Saisons')
                ->relationship('seasons', 'name')
                ->multiple()
                ->searchable()->createOptionForm([
                    TextInput::make('name')
                        ->required(),
                ]),

            // bool is active only for admin
            Toggle::make('is_active')
                ->label('Est actif ?')
                ->disabled(!auth()->user()->hasRole('admin'))
                ->default(false),

            Select::make('thematics')
                ->label('Thématiques')
                ->relationship('thematics', 'name')
                ->multiple()
                ->searchable()->createOptionForm([
                    TextInput::make('name')
                        ->required(),
                ]),

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

            TextColumn::make('description'),
        ])->filters([
            Tables\Filters\TrashedFilter::make(),
        ])
            ->actions([
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
            'index' => Pages\ListActivities::route('/'),
            'create' => Pages\CreateActivity::route('/create'),
            'edit' => Pages\EditActivity::route('/{record}/edit'),
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

    public static function getRelations(): array
    {
        return [
            AddressRelationManager::class,
            SeasonsRelationManager::class,
            ThematicsRelationManager::class
        ];
    }
}
