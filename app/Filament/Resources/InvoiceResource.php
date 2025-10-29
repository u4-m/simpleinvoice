<?php

namespace App\Filament\Resources;

use App\Models\Invoice;
use Filament\Resources\Resource;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    // Remove all properties temporarily
    // protected static ?string $navigationIcon = 'heroicon-o-document-text';
    // protected static ?string $navigationGroup = 'Billing';
    // protected static ?string $navigationLabel = 'Invoices';
    // protected static ?string $pluralModelLabel = 'Invoices';
    // protected static ?string $modelLabel = 'Invoice';

    public static function getPages(): array
    {
        return [
            // Temporarily comment out pages
            // 'index' => Pages\ListInvoices::route('/'),
            // 'create' => Pages\CreateInvoice::route('/create'),
            // 'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }
}