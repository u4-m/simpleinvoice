<?php

namespace App\Filament\Resources;

use App\Models\InvoiceItem;
use Filament\Resources\Resource;
use App\Filament\Resources\InvoiceItemResource\Pages\ListInvoiceItems;
use App\Filament\Resources\InvoiceItemResource\Pages\CreateInvoiceItem;
use App\Filament\Resources\InvoiceItemResource\Pages\EditInvoiceItem;

class InvoiceItemResource extends Resource
{
    public static function getModel(): string
    {
        return InvoiceItem::class;
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-rectangle-stack';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Billing';
    }

    public static function getFormSchema(): array
    {
        return [
            \Filament\Forms\Components\Select::make('invoice_id')
                ->label('Invoice')
                ->relationship('invoice', 'invoice_number')
                ->required()
                ->searchable(),
            \Filament\Forms\Components\TextInput::make('quantity')
                ->label('Quantity')
                ->numeric()
                ->required()
                ->default(1),
            \Filament\Forms\Components\TextInput::make('description')
                ->label('Description')
                ->required()
                ->maxLength(255),
            \Filament\Forms\Components\TextInput::make('price')
                ->label('Price')
                ->numeric()
                ->required()
                ->prefix('$'),
            \Filament\Forms\Components\TextInput::make('total')
                ->label('Total')
                ->numeric()
                ->required()
                ->prefix('$')
                ->disabled()
                ->dehydrated(),
        ];
    }

    public static function getTableColumns(): array
    {
        return [
            \Filament\Tables\Columns\TextColumn::make('invoice.invoice_number')
                ->label('Invoice Number')
                ->searchable(),
            \Filament\Tables\Columns\TextColumn::make('description')
                ->label('Description')
                ->searchable(),
            \Filament\Tables\Columns\TextColumn::make('quantity')
                ->label('Quantity'),
            \Filament\Tables\Columns\TextColumn::make('price')
                ->label('Price')
                ->money('USD'),
            \Filament\Tables\Columns\TextColumn::make('total')
                ->label('Total')
                ->money('USD'),
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
