<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ThematicResource\Pages;
use App\Models\Thematic;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ThematicResource extends Resource
{
    protected static ?string $model = Thematic::class;

    protected static ?string $slug = 'thematics';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->required(),

            Placeholder::make('created_at')
                ->label('Created Date')
                ->content(fn(?Thematic $record): string => $record?->created_at?->diffForHumans() ?? '-'),

            Placeholder::make('updated_at')
                ->label('Last Modified Date')
                ->content(fn(?Thematic $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
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
            'index' => Pages\ListThematics::route('/'),
            'create' => Pages\CreateThematic::route('/create'),
            'edit' => Pages\EditThematic::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }
}
