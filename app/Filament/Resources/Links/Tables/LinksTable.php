<?php

namespace App\Filament\Resources\Links\Tables;

use App\Models\Link;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LinksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(Link::query())
            ->columns([
                TextColumn::make('title')
                    ->label('Название')
                    ->searchable(),
                TextColumn::make('original_url')
                    ->label('Оригинальный URL-адрес')
                    ->copyable(),
                TextColumn::make('redirect_url')
                    ->label('URL-адрес для переадресации')
                    ->copyable(),
                TextColumn::make('transitions_count')
                    ->label('Количество кликов'),
                TextColumn::make('created_at')
                    ->label('Дата создания')
                    ->asMskDateTime(),
            ])
            ->actions([
                DeleteAction::make()
                    ->label('Удалить')
                    ->modalHeading('Удаление ссылки')
                    ->modalDescription('Вы уверены, что хотите безвозвратно удалить эту ссылку?')
                    ->modalSubmitActionLabel('Да, удалить')
                    ->modalCancelActionLabel('Отмена'),
                EditAction::make()
                    ->label('Редактировать')
                    ->model(Link::class)
                    ->form([
                        TextInput::make('title')
                            ->label('Название')
                            ->required()
                            ->maxLength(255),
                    ]),
                ViewAction::make()
                    ->label('Просмотр'),
            ]);
    }
}
