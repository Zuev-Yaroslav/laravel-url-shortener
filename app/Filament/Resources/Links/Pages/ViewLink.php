<?php

namespace App\Filament\Resources\Links\Pages;

use App\Filament\Resources\Links\LinkResource;
use App\Filament\Resources\Links\Schemas\ViewLinkForm;
use App\Models\Link;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms\Form;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ViewLink extends ViewRecord
{
    protected static string $resource = LinkResource::class;
    protected static ?string $title = 'Просмотр ссылки';
    public function form(Schema $schema): Schema
    {
        return ViewLinkForm::configure($schema);
    }
//    protected string $view = 'filament.pages.admin.link.link-view';

}
