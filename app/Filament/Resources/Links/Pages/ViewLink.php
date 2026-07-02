<?php

namespace App\Filament\Resources\Links\Pages;

use App\Filament\Resources\Links\LinkResource;
use App\Filament\Resources\Links\Schemas\ViewLinkForm;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;

class ViewLink extends ViewRecord
{
    protected static string $resource = LinkResource::class;
    protected static ?string $title = 'Просмотр ссылки';
    public function form(Schema $schema): Schema
    {
        return ViewLinkForm::configure($schema);
    }

}
