<?php

namespace App\Filament\Resources;

use App\Models\Invoice;
use Filament\Resources\Resource;
use App\Filament\Resources\InvoiceResource\Pages\ListInvoices;
use App\Filament\Resources\InvoiceResource\Pages\CreateInvoice;
use App\Filament\Resources\InvoiceResource\Pages\EditInvoice;

class InvoiceResource extends Resource
{
    public static function getModel(): string
    {
        return Invoice::class;
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-document-text';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Billing';
    }

    public static function getNavigationLabel(): string
    {
        return 'Invoices';
    }

    public static function getModelLabel(): string
    {
        return 'Invoice';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Invoices';
    }

    public static function getFormSchema(): array
    {
        return [
            \Filament\Forms\Components\TextInput::make('invoice_number')
                ->label('Invoice Number')
                ->required()
                ->maxLength(255),
            \Filament\Forms\Components\TextInput::make('client_name')
                ->label('Client Name')
                ->required()
                ->maxLength(255),
            \Filament\Forms\Components\DatePicker::make('invoice_date')
                ->label('Invoice Date')
                ->required(),
            \Filament\Forms\Components\TextInput::make('amount')
                ->label('Amount')
                ->numeric()
                ->required(),
        ];
    }

    public static function getTableColumns(): array
    {
        return [
            \Filament\Tables\Columns\TextColumn::make('invoice_number')
                ->label('Invoice Number')
                ->searchable(),
            \Filament\Tables\Columns\TextColumn::make('client_name')
                ->label('Client Name')
                ->searchable(),
            \Filament\Tables\Columns\TextColumn::make('invoice_date')
                ->label('Date')
                ->date(),
            \Filament\Tables\Columns\TextColumn::make('amount')
                ->label('Amount')
                ->money('usd'),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListInvoices::route('/'),
            'create' => CreateInvoice::route('/create'),
            'edit' => EditInvoice::route('/{record}/edit'),
        ];
    }
}
