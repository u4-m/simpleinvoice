<?php
namespace App\Filament\Resources\InvoiceItemResource\Schemas;
use Filament\Schemas\Components\Select;
use Filament\Schemas\Components\TextInput;
use Filament\Schemas\Schema;
class InvoiceItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Select::make('invoice_id')->label('Invoice')->relationship('invoice','invoice_number')->required()->searchable(),
            TextInput::make('quantity')->label('Quantity')->numeric()->required()->default(1),
            TextInput::make('description')->label('Description')->required()->maxLength(255),
            TextInput::make('price')->label('Price')->numeric()->required()->prefix('$'),
            TextInput::make('total')->label('Total')->numeric()->required()->prefix('$')->disabled()->dehydrated()
        ]);
    }
}
