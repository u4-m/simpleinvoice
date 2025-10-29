<?php

namespace App\Filament\Resources\InvoiceItems;

use App\Filament\Resources\InvoiceItems\Pages\CreateInvoiceItem;
use App\Filament\Resources\InvoiceItems\Pages\EditInvoiceItem;
use App\Filament\Resources\InvoiceItems\Pages\ListInvoiceItems;
use App\Filament\Resources\InvoiceItems\Schemas\InvoiceItemForm;
use App\Filament\Resources\InvoiceItems\Tables\InvoiceItemsTable;
use App\Models\InvoiceItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class InvoiceItemResource extends Resource
{
    protected static ?string $model = InvoiceItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'description';

    public static function form(Schema $schema): Schema
    {
        return InvoiceItemForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InvoiceItemsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListInvoiceItems::route('/'),
            'create' => CreateInvoiceItem::route('/create'),
            'edit' => EditInvoiceItem::route('/{record}/edit'),
        ];
    }
}
