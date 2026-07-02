<?php

namespace App\Filament\Resources\Links\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TransitionsRelationManager extends RelationManager
{
    protected static string $relationship = 'transitions';
    protected static ?string $title = 'История переходов';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('ip_address')
            ->columns([
                TextColumn::make('ip_address')
                    ->label('IP Address'),
                TextColumn::make('created_at')
                    ->label('Дата клика')
                    ->asMskDateTime(),
            ]);
    }
}
