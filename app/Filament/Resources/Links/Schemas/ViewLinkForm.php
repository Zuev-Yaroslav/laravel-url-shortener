<?php

namespace App\Filament\Resources\Links\Schemas;

use App\Models\Link;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ViewLinkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Название ссылки')
                    ->disabled(),

                TextInput::make('original_url')
                    ->label('Оригинальный URL')
                    ->disabled(),

                TextInput::make('redirect_url')
                    ->label('URL-адрес для переадресации')
                    ->dehydrated(false)
                    ->formatStateUsing(function (Link $record): string {
                        return $record->redirect_url;
                    })
                    ->disabled(),

                TextInput::make('transitions_count')
                    ->label('Всего переходов')
                    ->dehydrated(false)
                    ->formatStateUsing(function (Link $record): string {
                        return $record->transitions_count;
                    })
                    ->disabled(),

                DateTimePicker::make('created_at')
                    ->label('Дата создания')
                    ->timezone('Europe/Moscow')
                    ->disabled(),
            ]);
    }
}
