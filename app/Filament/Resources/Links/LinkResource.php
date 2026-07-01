<?php

namespace App\Filament\Resources\Links;

use App\Filament\Resources\Links\Pages\CreateLink;
use App\Filament\Resources\Links\Pages\EditLink;
use App\Filament\Resources\Links\Pages\ListLinks;
use App\Filament\Resources\Links\Pages\ViewLink;
use App\Filament\Resources\Links\RelationManagers\TransitionsRelationManager;
use App\Filament\Resources\Links\Schemas\ViewLinkForm;
use App\Filament\Resources\Links\Tables\LinksTable;
use App\Models\Link;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LinkResource extends Resource
{
    protected static ?string $model = Link::class;
    protected static ?string $navigationLabel = 'Ссылки';
    protected static ?string $breadcrumb = 'Ссылки';
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-link';
    protected static ?string $slug = 'links';

    public static function table(Table $table): Table
    {
        return LinksTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            TransitionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLinks::route('/'),
            'view' => ViewLink::route('/{record}'),
        ];
    }
}
