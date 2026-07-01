<?php

namespace App\Filament\Resources\Links\Pages;

use App\Filament\Resources\Links\LinkResource;
use App\Models\Link;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Str;

class ListLinks extends ListRecords
{
    protected static string $resource = LinkResource::class;
    protected string $view = 'filament.pages.admin.link.link-index';
    protected static ?string $title = 'Ссылки';


    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Добавить')
                ->model(Link::class)

                ->form([
                    TextInput::make('title')
                        ->label('Название')
                        ->maxLength(255)
                        ->required(),
                    TextInput::make('original_url')
                        ->label('Оригинальный URL-адрес')
                        ->maxLength(255)
                        ->url()
                        ->required(),
                ])
                ->mutateFormDataUsing(function (array $data) {
                    $ulid = strtolower(substr(Str::ulid(), 0, 15));
                    $data['redirect_ulid'] = $ulid;
                    $data['user_id'] = auth()->id();

                    return $data;
                }),
        ];
    }
}
