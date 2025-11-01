<?php
namespace App\Filament\Resources\InvoiceItemResource\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
class InvoiceItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('invoice.invoice_number')->label('Invoice Number')->searchable(),
            TextColumn::make('description')->label('Description')->searchable(),
            TextColumn::make('quantity')->label('Quantity'),
            TextColumn::make('price')->label('Price')->money('USD'),
            TextColumn::make('total')->label('Total')->money('USD')
        ])->filters([])->actions([
            \Filament\Tables\Actions\EditAction::make(),
            \Filament\Tables\Actions\DeleteAction::make()
        ]);
    }
}
